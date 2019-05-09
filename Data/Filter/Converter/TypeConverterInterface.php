<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter\Converter;

use Skrepr\SymfonyAgGridBundle\Data\Filter\Type\Type;

interface TypeConverterInterface
{
    public function getFilterType(array $conditionData): Type;

    public function getFilterName(): string;

    public function getSql(string $filterKey, Type $type): string;
}
