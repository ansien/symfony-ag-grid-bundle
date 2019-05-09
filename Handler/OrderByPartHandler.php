<?php

namespace Skrepr\SymfonyAgGridBundle\Handler;

use Skrepr\SymfonyAgGridBundle\Data\Filter\OrderByPart;
use Skrepr\SymfonyAgGridBundle\Data\Grid\GridInterface;
use Skrepr\SymfonyAgGridBundle\Util\GridMapper;

class OrderByPartHandler
{
    public function getOrderByParts(array $sortModel, GridInterface $grid): array
    {
        $orderByParts = [];

        foreach ($sortModel as $sortItem) {
            $mappedFieldKey = GridMapper::getMappedField($grid, $sortItem['colId']);
            $orderByParts[] = new OrderByPart($mappedFieldKey, $sortItem['sort']);
        }

        return $orderByParts;
    }
}
