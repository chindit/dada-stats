<?php
declare(strict_types=1);

namespace App\Model;


use Ramsey\Uuid\Uuid;

class ChartModel
{
    /** @var string */
    private $title;
    /** @var string */
    private $type;
    /** @var array */
    private $labels;
    /** @var DatasetModel[] */
    private $dataset;
    /** @var string */
    private $uuid;

    public function __construct(string $type, string $title, array $labels)
    {
        $this->type = $type;
        $this->title = $title;
        $this->labels = $labels;
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function getDataset(): array
    {
        return array_reverse($this->dataset);
    }

    public function addDataset(DatasetModel $dataset): self
    {
        $this->dataset[] = $dataset;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
