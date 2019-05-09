<?php

namespace Ansien\SymfonyAgGridBundle;

use Ansien\SymfonyAgGridBundle\CompilerPass\ConverterCompilerPass;
use Ansien\SymfonyAgGridBundle\CompilerPass\FilterTypeCompilerPass;
use Ansien\SymfonyAgGridBundle\CompilerPass\GridCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SymfonyAgGridBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new GridCompilerPass());
        $container->addCompilerPass(new FilterTypeCompilerPass());
        $container->addCompilerPass(new ConverterCompilerPass());
    }
}
