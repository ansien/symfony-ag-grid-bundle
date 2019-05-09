<?php

namespace Skrepr\SymfonyAgGridBundle\Context;

use Skrepr\SymfonyAgGridBundle\Data\Grid\GridInterface;

class GridContext
{
    /**
     * @var array
     */
    private $grids;

    public function __construct()
    {
        $this->grids = [];
    }

    public function getGrid(string $gridName): GridInterface
    {
        if (array_key_exists($gridName, $this->grids) === false) {
            throw new \BadFunctionCallException("Grid $gridName not found.");
        }

        return $this->grids[$gridName];
    }

    public function addGrid(string $gridName, GridInterface $grid): void
    {
        $this->grids[$gridName] = $grid;
    }
}
