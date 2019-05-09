<?php

namespace Skrepr\SymfonyAgGridBundle\Handler;

use Doctrine\ORM\QueryBuilder;
use Skrepr\SymfonyAgGridBundle\Data\Filter\FilterParts;
use Skrepr\SymfonyAgGridBundle\Data\Filter\OrderByPart;
use Skrepr\SymfonyAgGridBundle\Data\Filter\WherePart;

/**
 * @todo createSelectExpressions()
 * @todo createGroupByExpressions()
 */
class GridHandler
{
    /**
     * @param WherePart[] $whereParts
     */
    private function createWhereExpressions(array $whereParts, QueryBuilder $queryBuilder): QueryBuilder
    {
        foreach ($whereParts as $wherePart) {
            $queryBuilder->andWhere($wherePart->getSqlString());
        }

        return $queryBuilder;
    }

    /**
     * @param OrderByPart[] $orderByParts
     */
    private function createOrderByExpressions(array $orderByParts, QueryBuilder $queryBuilder): QueryBuilder
    {
        foreach ($orderByParts as $orderByPart) {
            $queryBuilder->addOrderBy($orderByPart->getColId(), $orderByPart->getSort());
        }

        return $queryBuilder;
    }

    public function hydrateQueryBuilder(FilterParts $filterParts, QueryBuilder $queryBuilder): QueryBuilder
    {
        $this->createWhereExpressions($filterParts->getWhereParts(), $queryBuilder);
        $this->createOrderByExpressions($filterParts->getOrderByParts(), $queryBuilder);

        return $queryBuilder;
    }
}
