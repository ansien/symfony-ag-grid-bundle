<?php

namespace Ansien\SymfonyAgGridBundle\Data;

use Ansien\SymfonyAgGridBundle\Data\Grid\GridColumnVO;

class ServerSideGetRowsRequest
{
    /**
     * @var GridColumnVO[]
     */
    private $rowGroupCols;

    /**
     * @var GridColumnVO[]
     */
    private $valueCols;

    /**
     * @var GridColumnVO[]
     */
    private $pivotCols;

    /**
     * @var bool
     */
    private $pivotMode;

    /**
     * @var string[]
     */
    private $groupKeys;

    /**
     * @var ?
     */
    private $filterModel;

    /**
     * @var
     */
    private $sortModel;

    /**
     * @return GridColumnVO[]
     */
    public function getRowGroupCols(): array
    {
        return $this->rowGroupCols;
    }

    /**
     * @param GridColumnVO[] $rowGroupCols
     */
    public function setRowGroupCols(array $rowGroupCols): ServerSideGetRowsRequest
    {
        $this->rowGroupCols = $rowGroupCols;

        return $this;
    }

    /**
     * @return GridColumnVO[]
     */
    public function getValueCols(): array
    {
        return $this->valueCols;
    }

    /**
     * @param GridColumnVO[] $valueCols
     */
    public function setValueCols(array $valueCols): ServerSideGetRowsRequest
    {
        $this->valueCols = $valueCols;

        return $this;
    }

    /**
     * @return GridColumnVO[]
     */
    public function getPivotCols(): array
    {
        return $this->pivotCols;
    }

    /**
     * @param GridColumnVO[] $pivotCols
     */
    public function setPivotCols(array $pivotCols): ServerSideGetRowsRequest
    {
        $this->pivotCols = $pivotCols;

        return $this;
    }

    public function isPivotMode(): bool
    {
        return $this->pivotMode;
    }

    public function setPivotMode(bool $pivotMode): ServerSideGetRowsRequest
    {
        $this->pivotMode = $pivotMode;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getGroupKeys(): array
    {
        return $this->groupKeys;
    }

    /**
     * @param string[] $groupKeys
     */
    public function setGroupKeys(array $groupKeys): ServerSideGetRowsRequest
    {
        $this->groupKeys = $groupKeys;

        return $this;
    }

    public function getFilterModel()
    {
        return $this->filterModel;
    }

    public function setFilterModel($filterModel): ServerSideGetRowsRequest
    {
        $this->filterModel = $filterModel;

        return $this;
    }

    public function getSortModel()
    {
        return $this->sortModel;
    }

    public function setSortModel($sortModel): ServerSideGetRowsRequest
    {
        $this->sortModel = $sortModel;

        return $this;
    }
}
