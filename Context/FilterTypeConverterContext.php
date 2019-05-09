<?php

namespace Ansien\SymfonyAgGridBundle\Context;

use Ansien\SymfonyAgGridBundle\Data\Filter\Converter\TypeConverterInterface;

class FilterTypeConverterContext
{
    /**
     * @var array
     */
    private $filterTypes;

    public function __construct()
    {
        $this->filterTypes = [];
    }

    public function getTypeConverter(string $filterTypeConverterName): TypeConverterInterface
    {
        if (array_key_exists($filterTypeConverterName, $this->filterTypes) === false) {
            throw new \BadFunctionCallException("Filter type converter $filterTypeConverterName not found.");
        }

        return $this->filterTypes[$filterTypeConverterName];
    }

    public function addTypeConverter(TypeConverterInterface $filterTypeConverter): void
    {
        $this->filterTypes[$filterTypeConverter->getFilterName()] = $filterTypeConverter;
    }
}
