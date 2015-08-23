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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class GnugatSearchEngineExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new YamlFileLoader($container, $fileLocator);
        $loader->load('services.yml');

        $this->addClassesToCompile(array(
            'Gnugat\SearchEngine\Builder\FilteringBuilderStrategy\RangeFilteringBuilderStrategy',
            'Gnugat\SearchEngine\Builder\FilteringBuilderStrategy\RegexFilteringBuilderStrategy',
            'Gnugat\SearchEngine\Builder\FilteringBuilderStrategy\StrictComparisonFilteringBuilderStrategy',
            'Gnugat\SearchEngine\Builder\FilteringBuilder',
            'Gnugat\SearchEngine\Builder\FilteringBuilderStrategy',
            'Gnugat\SearchEngine\Builder\OrderingsBuilder',
            'Gnugat\SearchEngine\Builder\PaginatingBuilder',
            'Gnugat\SearchEngine\Builder\QueryBuilder',
            'Gnugat\SearchEngine\Builder\QueryBuilderFactory',
            'Gnugat\SearchEngine\Builder\SelectBuilder',

            'Gnugat\SearchEngine\Criteria\Embeding',
            'Gnugat\SearchEngine\Criteria\EmbedingFactory',
            'Gnugat\SearchEngine\Criteria\Filtering',
            'Gnugat\SearchEngine\Criteria\FilteringFactory',
            'Gnugat\SearchEngine\Criteria\Ordering',
            'Gnugat\SearchEngine\Criteria\OrderingsFactory',
            'Gnugat\SearchEngine\Criteria\Paginating',
            'Gnugat\SearchEngine\Criteria\PaginatingFactory',

            'Gnugat\SearchEngine\Service\TypeSanitizer',
            'Gnugat\SearchEngine\Build',
            'Gnugat\SearchEngine\Criteria',
            'Gnugat\SearchEngine\CriteriaFactory',
            'Gnugat\SearchEngine\Fetcher',
            'Gnugat\SearchEngine\IdentifierEngine',
            'Gnugat\SearchEngine\NoMatchException',
            'Gnugat\SearchEngine\ResourceDefinition',
            'Gnugat\SearchEngine\SearchEngine',
        ));
    }
}
