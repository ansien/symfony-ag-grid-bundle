<?php

namespace Skrepr\SymfonyAgGridBundle\Handler;

use Skrepr\SymfonyAgGridBundle\Data\Filter\FilterParts;
use Skrepr\SymfonyAgGridBundle\Data\Grid\GridInterface;
use Skrepr\SymfonyAgGridBundle\Data\ServerSideGetRowsRequest;

class FilterHandler
{
    /**
     * @var WherePartHandler
     */
    private $wherePartHandler;

    /**
     * @var OrderByPartHandler
     */
    private $orderByPartHandler;

    public function __construct(WherePartHandler $wherePartHandler, OrderByPartHandler $orderByPartHandler)
    {
        $this->wherePartHandler = $wherePartHandler;
        $this->orderByPartHandler = $orderByPartHandler;
    }

    public function convertRowsRequest(ServerSideGetRowsRequest $grRequest, GridInterface $grid): FilterParts
    {
        $whereParts = $this->wherePartHandler->getWhereParts($grRequest->getRowGroupCols(), $grRequest->getGroupKeys(), $grRequest->getFilterModel(), $grid);
        $orderByParts = $this->orderByPartHandler->getOrderByParts($grRequest->getSortModel(), $grid);

        return (new FilterParts())
            ->setWhereParts($whereParts)
            ->setOrderByParts($orderByParts);
    }
}
