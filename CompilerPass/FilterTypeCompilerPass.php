<?php

namespace Skrepr\SymfonyAgGridBundle\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FilterTypeCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $contextDefinition = $container->findDefinition('symfony_ag_grid_bundle.filter_type_converter_context');

        $serviceIds = array_keys(
            $container->findTaggedServiceIds('ag_grid_bundle_filter_type_converter')
        );

        foreach ($serviceIds as $serviceId) {
            $contextDefinition->addMethodCall(
                'addTypeConverter',
                [new Reference($serviceId)]
            );
        }
    }
}
