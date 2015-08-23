<?php

/*
 * This file is part of the gnugat/search-engine-bundle package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\SearchEngineBundle\Tests\Fixtures;

use Gnugat\SearchEngine\Builder\FilteringBuilderStrategy;
use Gnugat\SearchEngine\Builder\QueryBuilder;
use Gnugat\SearchEngine\ResourceDefinition;

class DummyFilteringBuilderStrategy implements FilteringBuilderStrategy
{
    /**
     * {@inheritdoc}
     */
    public function supports(ResourceDefinition $resourceDefinition, $field, $value)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function build(QueryBuilder $queryBuilder, ResourceDefinition $resourceDefinition, $field, $value)
    {
    }
}
