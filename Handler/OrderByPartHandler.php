<?php

namespace Ansien\SymfonyAgGridBundle\Handler;

use Ansien\SymfonyAgGridBundle\Data\Filter\OrderByPart;
use Ansien\SymfonyAgGridBundle\Data\Grid\GridInterface;
use Ansien\SymfonyAgGridBundle\Util\GridMapper;

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
