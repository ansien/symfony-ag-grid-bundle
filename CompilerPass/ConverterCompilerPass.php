<?php

namespace SymfonyAgGridBundle\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ConverterCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $contextDefinition = $container->findDefinition('symfony_ag_grid_bundle.converter_context');

        $serviceIds = array_keys(
            $container->findTaggedServiceIds('ag_grid_bundle_converter')
        );

        foreach ($serviceIds as $serviceId) {
            $contextDefinition->addMethodCall(
                'addConverter',
                [$serviceId, new Reference($serviceId)]
            );
        }
    }
}
