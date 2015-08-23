<?php

/*
 * This file is part of the gnugat/search-engine-bundle package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\SearchEngineBundle\DependencyInjection;

use Gnugat\SearchEngine\Build;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class FilteringBuilderStrategyCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('gnugat_search_engine.build')) {
            return;
        }
        $build = $container->getDefinition('gnugat_search_engine.build');
        $taggedServices = $container->findTaggedServiceIds('gnugat_search_engine.filtering_builder_strategy');
        foreach ($taggedServices as $id => $attributes) {
            $priority = isset($attributes[0]['priority']) ? $attributes[0]['priority'] : 0;
            $build->addMethodCall('addFilteringBuilderStrategy', array(new Reference($id), $priority));
        }
    }
}
