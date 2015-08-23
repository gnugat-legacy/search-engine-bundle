<?php

/*
 * This file is part of the gnugat/search-engine-bundle package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\SearchBundle\Tests;

use PHPUnit_Framework_TestCase;

class ServiceTest extends PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', false);
        $kernel->boot();
        $this->container = $kernel->getContainer();
    }

    /**
     * @test
     */
    public function it_has_criteria_factory()
    {
        $criteriaFactory = $this->container->get('gnugat_search_engine.criteria_factory');

        self::assertInstanceOf('Gnugat\SearchEngine\CriteriaFactory', $criteriaFactory);
    }

    /**
     * @test
     */
    public function it_has_search_engine()
    {
        $searchEngine = $this->container->get('gnugat_search_engine.search_engine');

        self::assertInstanceOf('Gnugat\SearchEngine\SearchEngine', $searchEngine);
    }

    /**
     * @test
     */
    public function it_has_identifier_engine()
    {
        $identifierEngine = $this->container->get('gnugat_search_engine.identifier_engine');

        self::assertInstanceOf('Gnugat\SearchEngine\IdentifierEngine', $identifierEngine);
    }
}
