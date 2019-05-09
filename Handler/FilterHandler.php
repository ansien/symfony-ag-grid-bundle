<?php

namespace Ansien\SymfonyAgGridBundle\Handler;

use Ansien\SymfonyAgGridBundle\Data\Filter\FilterParts;
use Ansien\SymfonyAgGridBundle\Data\Grid\GridInterface;
use Ansien\SymfonyAgGridBundle\Data\ServerSideGetRowsRequest;

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
