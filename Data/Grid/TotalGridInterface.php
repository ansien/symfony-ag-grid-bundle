<?php

namespace Ansien\SymfonyAgGridBundle\Data\Grid;

interface TotalGridInterface
{
    public function getGridTotals($input): array;
}
