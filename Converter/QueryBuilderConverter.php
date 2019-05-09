<?php

namespace Skrepr\SymfonyAgGridBundle\Converter;

use Doctrine\ORM\QueryBuilder;
use Skrepr\SymfonyAgGridBundle\Data\Filter\OrderByPart;
use Skrepr\SymfonyAgGridBundle\Data\Filter\WherePart;
use Skrepr\SymfonyAgGridBundle\Data\Grid\GridBuilder;

class QueryBuilderConverter implements ConverterInterface
{
    private function createSelectExpressions(QueryBuilder $qb): void
    {
        // @TODO
    }

    private function createGroupByExpressions(QueryBuilder $qb): void
    {
        // @TODO
    }

    /**
     * @param WherePart[] $whereParts
     */
    private function createWhereExpressions(array $whereParts, QueryBuilder $qb): void
    {
        foreach ($whereParts as $wherePart) {
            $qb->andWhere($wherePart->getSqlString());
        }
    }

    /**
     * @param OrderByPart[] $orderByParts
     */
    private function createOrderByExpressions(array $orderByParts, QueryBuilder $qb): void
    {
        foreach ($orderByParts as $orderByPart) {
            $qb->addOrderBy($orderByPart->getColId(), $orderByPart->getSort());
        }
    }

    /**
     * @param QueryBuilder $queryBuilder
     */
    public function convert(GridBuilder $gridBuilder, $queryBuilder): QueryBuilder
    {
        $filterParts = $gridBuilder->getFilterParts();

        $this->createWhereExpressions($filterParts->getWhereParts(), $queryBuilder);
        $this->createOrderByExpressions($filterParts->getOrderByParts(), $queryBuilder);

        return $queryBuilder;
    }
}
