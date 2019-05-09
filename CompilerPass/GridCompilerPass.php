<?php

namespace Skrepr\SymfonyAgGridBundle\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class GridCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $contextDefinition = $container->findDefinition('symfony_ag_grid_bundle.grid_context');

        $serviceIds = array_keys(
            $container->findTaggedServiceIds('ag_grid_bundle_grid')
        );

        foreach ($serviceIds as $serviceId) {
            $contextDefinition->addMethodCall(
                'addGrid',
                [$serviceId, new Reference($serviceId)]
            );
        }
    }
}
