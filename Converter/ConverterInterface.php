<?php

namespace Ansien\SymfonyAgGridBundle\Converter;

use Ansien\SymfonyAgGridBundle\Data\Grid\GridBuilder;

interface ConverterInterface
{
    public function convert(GridBuilder $gridBuilder, $input);
}
