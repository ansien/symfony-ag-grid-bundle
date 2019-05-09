<?php

namespace Ansien\SymfonyAgGridBundle\Context;

use Ansien\SymfonyAgGridBundle\Converter\ConverterInterface;
use Ansien\SymfonyAgGridBundle\Data\Grid\GridInterface;

class ConverterContext
{
    /**
     * @var array
     */
    private $converters;

    public function __construct()
    {
        $this->converters = [];
    }

    /**
     * @return GridInterface
     */
    public function getConverter(string $converterName): ConverterInterface
    {
        if (array_key_exists($converterName, $this->converters) === false) {
            throw new \BadFunctionCallException("Converter $converterName not found.");
        }

        return $this->converters[$converterName];
    }

    public function addConverter(string $converterName, ConverterInterface $converter): void
    {
        $this->converters[$converterName] = $converter;
    }
}
