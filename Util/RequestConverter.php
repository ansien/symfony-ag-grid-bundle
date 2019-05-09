<?php

namespace Skrepr\SymfonyAgGridBundle\Util;

use Skrepr\SymfonyAgGridBundle\Data\ServerSideGetRowsRequest;

final class RequestConverter
{
    public static function getRowsRequest(array $paramData): ServerSideGetRowsRequest
    {
        $serverSideGetRowsRequest = (new ServerSideGetRowsRequest())
            ->setRowGroupCols($paramData['rowGroupCols'])
            ->setValueCols($paramData['valueCols'])
            ->setPivotCols($paramData['pivotCols'])
            ->setPivotMode($paramData['pivotMode'])
            ->setGroupKeys($paramData['groupKeys'])
            ->setFilterModel($paramData['filterModel'])
            ->setSortModel($paramData['sortModel']);

        return $serverSideGetRowsRequest;
    }
}
