<?php

namespace Ansien\SymfonyAgGridBundle\Converter;

interface ConverterInputInterface
{
    public function __construct($input, $output);

    public function getInput();

    public function getOutput();
}
