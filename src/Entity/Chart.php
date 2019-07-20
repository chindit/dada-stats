<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChartRepository")
 */
class Chart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $timeRange = 1;

    /**
     * @ORM\Column(type="array")
     */
    private $metrics = [];

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTimeRange(): ?int
    {
        return $this->timeRange;
    }

    public function setTimeRange(int $timeRange): self
    {
        $this->timeRange = $timeRange;

        return $this;
    }

    public function setMetrics(array $metrics): self
    {
        $this->metrics = $metrics;

        return $this;
    }

    public function getMetrics(): ?array
    {
        return $this->metrics;
    }

    public function setYAxisLegend(string $yAxisLegend): self
    {
        $this->yAxisLegend = $yAxisLegend;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
