<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter;

class FilterParts
{
    /**
     * @var array
     */
    private $joinParts;

    /**
     * @var array
     */
    private $groupByParts;

    /**
     * @var WherePart[]
     */
    private $whereParts;

    /**
     * @var OrderByPart[]
     */
    private $orderByParts;

    public function __construct()
    {
        $this->joinParts = [];
        $this->groupByParts = [];
        $this->whereParts = [];
        $this->orderByParts = [];
    }

    public function getJoinParts(): array
    {
        return $this->joinParts;
    }

    public function setJoinParts(array $joinParts): FilterParts
    {
        $this->joinParts = $joinParts;

        return $this;
    }

    public function getGroupByParts(): array
    {
        return $this->groupByParts;
    }

    public function setGroupByParts(array $groupByParts): FilterParts
    {
        $this->groupByParts = $groupByParts;

        return $this;
    }

    public function getWhereParts(): array
    {
        return $this->whereParts;
    }

    public function setWhereParts(array $whereParts): FilterParts
    {
        $this->whereParts = $whereParts;

        return $this;
    }

    /**
     * @return OrderByPart[]
     */
    public function getOrderByParts(): array
    {
        return $this->orderByParts;
    }

    /**
     * @param OrderByPart[] $orderByParts
     */
    public function setOrderByParts(array $orderByParts): FilterParts
    {
        $this->orderByParts = $orderByParts;

        return $this;
    }
}
