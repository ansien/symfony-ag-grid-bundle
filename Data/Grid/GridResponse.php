<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Grid;

use Symfony\Component\HttpFoundation\JsonResponse;

class GridResponse extends JsonResponse
{
    /**
     * @var array
     */
    private $rows;

    /**
     * @var int
     */
    private $lastRow;

    /**
     * @var array
     */
    private $extra;

    public function __construct(array $rows, int $lastRow, ?array $extra = [])
    {
        parent::__construct(array_merge([
            'rows' => $rows,
            'lastRow' => $lastRow,
        ], $extra));

        $this->rows = $rows;
        $this->lastRow = $lastRow;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function setRows(array $rows): GridResponse
    {
        $this->rows = $rows;

        return $this;
    }

    public function getLastRow(): int
    {
        return $this->lastRow;
    }

    public function setLastRow(int $lastRow): GridResponse
    {
        $this->lastRow = $lastRow;

        return $this;
    }

    public function getExtra(): array
    {
        return $this->extra;
    }

    public function setExtra(array $extra): GridResponse
    {
        $this->extra = $extra;

        return $this;
    }
}
