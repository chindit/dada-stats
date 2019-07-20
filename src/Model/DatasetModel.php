<?php
declare(strict_types=1);

namespace App\Model;


class DatasetModel
{
    /** @var string */
    private $label;
    /** @var string */
    private $backgroundColor;
    /** @var string */
    private $color;
    /** @var array */
    private $data;

    public function __construct(string $label, array $data)
    {
        $this->color = sprintf('rgb(%d, %d, %d)', random_int(0, 255), random_int(0, 255), random_int(0, 255));
        $this->backgroundColor = $this->color;
        $this->label = $label;
        $this->data = $data;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getData(): array
    {
        return $this->data;
    }


}
