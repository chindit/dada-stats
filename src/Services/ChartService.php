<?php
declare(strict_types=1);

namespace App\Services;


use App\Model\ChartModel;
use App\Model\DatasetModel;
use App\Repository\ChartRepository;
use App\Repository\PollDataRepository;

class ChartService
{
    /**
     * @var ChartRepository
     */
    private $chartRepository;
    /**
     * @var PollDataRepository
     */
    private $pollDataRepository;

    public function __construct(ChartRepository $chartRepository, PollDataRepository $pollDataRepository)
    {
        $this->chartRepository = $chartRepository;
        $this->pollDataRepository = $pollDataRepository;
    }

    public function getAllChartData(): array
    {
        $charts = $this->chartRepository->findAll();

        $chartData = [];

        foreach ($charts as $chart)
        {
            $pollDataForChart = $this->pollDataRepository->getChartData(new \DateTimeImmutable('-24 hours'), $chart->getMetrics());

            $labels = [];
            $data = [];
            $labels = [];
            foreach ($pollDataForChart as $pollData)
            {
                $labels[] = $pollData->getDate()->format('H:i:s');
                $data[$pollData->getKey()][] = $pollData->getValue();
                $labels[$pollData->getKey()] = $pollData->getName();
            }

            $chartModel = new ChartModel('line', $chart->getTitle(), array_values(array_unique($labels)));
            foreach ($data as $name => $values)
            {
                $chartModel->addDataset(new DatasetModel($labels[$name], $values));
            }
            $chartData[] = $chartModel;
        }

        return $chartData;
    }
}
