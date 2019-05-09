<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter\Type;

class Type
{
    /**
     * @var string
     */
    private $filterType;

    /**
     * @var string
     */
    private $type;

    public function __construct(string $filterType, string $type)
    {
        $this->filterType = $filterType;
        $this->type = $type;
    }

    public function getFilterType(): string
    {
        return $this->filterType;
    }

    public function setFilterType(string $filterType): Type
    {
        $this->filterType = $filterType;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Type
    {
        $this->type = $type;

        return $this;
    }
}
