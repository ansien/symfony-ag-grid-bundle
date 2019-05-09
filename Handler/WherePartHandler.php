<?php

namespace Skrepr\SymfonyAgGridBundle\Handler;

use Skrepr\SymfonyAgGridBundle\Context\FilterTypeConverterContext;
use Skrepr\SymfonyAgGridBundle\Data\Filter\Type\Type;
use Skrepr\SymfonyAgGridBundle\Data\Filter\WherePart;
use Skrepr\SymfonyAgGridBundle\Data\Grid\GridInterface;
use Skrepr\SymfonyAgGridBundle\Util\GridMapper;

class WherePartHandler
{
    /**
     * @var FilterTypeConverterContext
     */
    private $filterTypeContext;

    public function __construct(FilterTypeConverterContext $filterTypeContext)
    {
        $this->filterTypeContext = $filterTypeContext;
    }

    public function getSqlString(WherePart $wherePart): string
    {
        $sqlStrings = [];

        foreach ($wherePart->getItems() as $filterItem) {
            $typeConverter = $this->filterTypeContext->getTypeConverter($filterItem->getFilterType());
            $sqlStrings[] = $typeConverter->getSql($wherePart->getKey(), $filterItem);
        }

        $operator = $wherePart->getOperator();
        if ($operator !== null && \count($sqlStrings) > 1) {
            $sqlString = implode(" $operator ", $sqlStrings);
        } else {
            $sqlString = $sqlStrings[0];
        }

        return $sqlString;
    }

    private function createWherePartItem(array $conditionData): Type
    {
        $typeConverter = $this->filterTypeContext->getTypeConverter($conditionData['filterType']);

        return $typeConverter->getFilterType($conditionData);
    }

    private function createWherePart(string $filterKey, array $filterGroupData): WherePart
    {
        $wherePart = new WherePart($filterKey);

        if (array_key_exists('condition1', $filterGroupData)) {
            $i = 1;
            $conditionKey = 'condition' . $i;

            while (array_key_exists($conditionKey, $filterGroupData)) {
                $item = $filterGroupData[$conditionKey];

                $filterItem = $this->createWherePartItem($item);
                $wherePart->addItem($filterItem);

                ++$i;
                $conditionKey = 'condition' . $i;
            }

            $wherePart->setOperator($filterGroupData['operator']);

            return $wherePart;
        }

        $singleItem = $this->createWherePartItem($filterGroupData);
        $wherePart->addItem($singleItem);

        return $wherePart;
    }

    public function getWhereParts(array $rowGroupCols, array $groupKeys, array $filterModel, GridInterface $grid): array
    {
        $whereParts = [];

        // Convert AgGrid filter model to WhereParts
        foreach ($filterModel as $filterKey => $filterItem) {
            // Ignore unmapped fields, so you can implement your own handler
            if (!GridMapper::hasMappedField($grid, $filterKey)) {
                continue;
            }

            $mappedFieldKey = GridMapper::getMappedField($grid, $filterKey);
            $whereParts[] = $this->createWherePart($mappedFieldKey, $filterItem);
        }

        foreach ($whereParts as $wherePart) {
            $sqlString = $this->getSqlString($wherePart);
            $wherePart->setSqlString($sqlString);
        }

        return $whereParts;
    }
}
