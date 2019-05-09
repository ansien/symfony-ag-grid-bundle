<?php

namespace Skrepr\SymfonyAgGridBundle\Converter;

use Skrepr\SymfonyAgGridBundle\Data\Grid\GridBuilder;

interface ConverterInterface
{
    public function convert(GridBuilder $gridBuilder, $input);
}
