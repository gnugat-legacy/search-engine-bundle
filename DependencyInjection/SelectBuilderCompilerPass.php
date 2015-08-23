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

use Gnugat\SearchEngine\ResourceDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class SelectBuilderCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $hasIdentifierEngine = $container->hasDefinition('gnugat_search_engine.identifier_engine');
        $hasSearchEngine = $container->hasDefinition('gnugat_search_engine.search_engine');
        if (!$hasIdentifierEngine || !$hasSearchEngine) {
            return;
        }
        $identifierEngine = $container->getDefinition('gnugat_search_engine.identifier_engine');
        $searchEngine = $container->getDefinition('gnugat_search_engine.search_engine');
        $taggedServices = $container->findTaggedServiceIds('gnugat_search_engine.select_builder');
        foreach ($taggedServices as $id => $attributes) {
            $resourceName = $attributes[0]['resource_name'];
            $resourceDefinitionParameter = json_decode($attributes[0]['resource_definition'], true);
            $resourceDefinition = new Definition('Gnugat\SearchEngine\ResourceDefinition', array(
                $resourceName,
                $resourceDefinitionParameter['fields'],
                $resourceDefinitionParameter['relations'],
            ));
            $identifierEngine->addMethodCall('add', array($resourceName, $resourceDefinition, new Reference($id)));
            $searchEngine->addMethodCall('add', array($resourceName, $resourceDefinition, new Reference($id)));
        }
    }
}
