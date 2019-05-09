<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter\Type;

class TextType extends Type
{
    /**
     * @var string
     */
    private $filter;

    public function __construct(string $filterType, string $type, string $filter)
    {
        parent::__construct($filterType, $type);

        $this->filter = $filter;
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function setFilter(string $filter): TextType
    {
        $this->filter = $filter;

        return $this;
    }
}
