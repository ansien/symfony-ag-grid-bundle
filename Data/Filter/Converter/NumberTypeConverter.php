<?php

namespace Ansien\SymfonyAgGridBundle\Data\Filter\Converter;

use Ansien\SymfonyAgGridBundle\Data\Filter\Type\NumberType;
use Ansien\SymfonyAgGridBundle\Data\Filter\Type\Type;

class NumberTypeConverter implements TypeConverterInterface
{
    public function getFilterType(array $conditionData): Type
    {
        return new NumberType(
            $conditionData['filterType'],
            $conditionData['type'],
            $conditionData['filter'],
            $conditionData['filterTo']
        );
    }

    public function getFilterName(): string
    {
        return 'number';
    }

    /**
     * @param Type|NumberType $numberType
     */
    public function getSql(string $filterKey, Type $numberType): string
    {
        $type = $numberType->getType();
        $filter = $numberType->getFilter();
        $filterTo = $numberType->getFilterTo();

        switch ($type) {
            case 'equals':
                return $filterKey . ' = ' . $filter;
            case 'notEqual':
                return $filterKey . ' != ' . $filter;
            case 'greaterThan':
                return $filterKey . ' > ' . $filter;
            case 'greaterThanOrEqual':
                return $filterKey . ' >= ' . $filter;
            case 'lessThan':
                return $filterKey . ' < ' . $filter;
            case 'lessThanOrEqual':
                return $filterKey . ' <= ' . $filter;
            case 'inRange':
                return '(' . $filterKey . ' >= ' . $filter . ' AND ' . $filterKey . ' <= ' . $filterTo . ')';
            default:
                return '';
        }
    }
}
