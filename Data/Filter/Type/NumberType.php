<?php

namespace Ansien\SymfonyAgGridBundle\Data\Filter\Type;

class NumberType extends Type
{
    /**
     * @var string
     */
    private $filter;

    /**
     * @var string|null
     */
    private $filterTo;

    public function __construct(string $filterType, string $type, string $filter, ?string $filterTo = null)
    {
        parent::__construct($filterType, $type);

        $this->filter = $filter;
        $this->filterTo = $filterTo;
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function setFilter(string $filter): NumberType
    {
        $this->filter = $filter;

        return $this;
    }

    public function getFilterTo(): ?string
    {
        return $this->filterTo;
    }

    public function setFilterTo(?string $filterTo): NumberType
    {
        $this->filterTo = $filterTo;

        return $this;
    }
}
