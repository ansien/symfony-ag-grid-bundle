<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter\Converter;

use Skrepr\SymfonyAgGridBundle\Data\Filter\Type\TextType;
use Skrepr\SymfonyAgGridBundle\Data\Filter\Type\Type;

class TextTypeConverter implements TypeConverterInterface
{
    public function getFilterType(array $conditionData): Type
    {
        return new TextType(
            $conditionData['filterType'],
            $conditionData['type'],
            $conditionData['filter']
        );
    }

    public function getFilterName(): string
    {
        return 'text';
    }

    /**
     * @param Type|TextType $textType
     */
    public function getSql(string $filterKey, Type $textType): string
    {
        $type = $textType->getType();
        $filter = $textType->getFilter();

        switch ($type) {
            case 'equals':
                return $filterKey . ' = \'' . $filter . '\'';
            case 'notEqual':
                return $filterKey . ' != \'' . $filter . '\'';
            case 'contains':
                return $filterKey . ' LIKE \'%' . $filter . '%\'';
            case 'notContains':
                return $filterKey . ' NOT LIKE \'%' . $filter . '%\'';
            case 'startsWith':
                return $filterKey . ' LIKE \'' . $filter . '%\'';
            case 'endsWith':
                return $filterKey . ' LIKE \'%' . $filter . '\'';
            default:
                return '';
        }
    }
}
