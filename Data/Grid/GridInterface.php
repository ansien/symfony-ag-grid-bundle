<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Grid;

interface GridInterface
{
    public function getGridResponse($input): GridResponse;

    public function getGridInput($extraInput = null);

    public function mapFields(): array;
}
