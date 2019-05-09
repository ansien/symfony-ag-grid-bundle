<?php

namespace Ansien\SymfonyAgGridBundle\Data\Filter\Converter;

use Ansien\SymfonyAgGridBundle\Data\Filter\Type\NumberType;
use Ansien\SymfonyAgGridBundle\Data\Filter\Type\Type;

class DateTypeConverter implements TypeConverterInterface
{
    public function getFilterType(array $conditionData): Type
    {
        return new NumberType(
            $conditionData['filterType'],
            $conditionData['type'],
            $conditionData['dateFrom'],
            $conditionData['dateTo']
        );
    }

    public function getFilterName(): string
    {
        return 'date';
    }

    /**
     * @param Type|NumberType $numberType
     */
    public function getSql(string $filterKey, Type $numberType): string
    {
        $type = $numberType->getType();
        $dateFrom = $numberType->getFilter();
        $dateTo = $numberType->getFilterTo();
        $filterKeyDate = "DATE($filterKey)";

        switch ($type) {
            case 'equals':
                return $filterKeyDate . ' = \'' . $dateFrom . '\'';
            case 'notEqual':
                return $filterKeyDate . ' != \'' . $dateFrom . '\'';
            case 'greaterThan':
                return $filterKeyDate . ' > \'' . $dateFrom . '\'';
            case 'greaterThanOrEqual':
                return $filterKeyDate . ' >= \'' . $dateFrom . '\'';
            case 'lessThan':
                return $filterKeyDate . ' < \'' . $dateFrom . '\'';
            case 'lessThanOrEqual':
                return $filterKeyDate . ' <= \'' . $dateFrom . '\'';
            case 'inRange':
                return '(' . $filterKeyDate . ' >= \'' . $dateFrom . '\' AND ' . $filterKeyDate . ' <= \'' . $dateTo . '\')';
            default:
                return '';
        }
    }
}
