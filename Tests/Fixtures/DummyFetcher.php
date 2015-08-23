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

use Gnugat\SearchEngine\Fetcher;

class DummyFetcher implements Fetcher
{
    /**
     * {@inheritdoc}
     */
    public function fetchAll($sql, array $parameters)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function fetchFirst($sql, array $parameters)
    {
    }
}
