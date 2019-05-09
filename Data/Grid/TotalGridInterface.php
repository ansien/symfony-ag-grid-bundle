<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Grid;

interface TotalGridInterface
{
    public function getGridTotals($input): array;
}
