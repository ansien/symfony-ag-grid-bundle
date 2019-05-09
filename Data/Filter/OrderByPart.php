<?php

namespace Ansien\SymfonyAgGridBundle\Data\Filter;

class OrderByPart
{
    /**
     * @var string
     */
    private $colId;

    /**
     * @var string
     */
    private $sort;

    public function __construct(string $colId, string $sort)
    {
        $this->colId = $colId;
        $this->sort = $sort;
    }

    public function getColId(): string
    {
        return $this->colId;
    }

    public function setColId(string $colId): OrderByPart
    {
        $this->colId = $colId;

        return $this;
    }

    public function getSort(): string
    {
        return $this->sort;
    }

    public function setSort(string $sort): OrderByPart
    {
        $this->sort = $sort;

        return $this;
    }
}
