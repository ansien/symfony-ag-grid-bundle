<?php

namespace Skrepr\SymfonyAgGridBundle;

use Skrepr\SymfonyAgGridBundle\CompilerPass\ConverterCompilerPass;
use Skrepr\SymfonyAgGridBundle\CompilerPass\FilterTypeCompilerPass;
use Skrepr\SymfonyAgGridBundle\CompilerPass\GridCompilerPass;
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
