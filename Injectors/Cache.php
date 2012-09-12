<?php

namespace Steel\Injectors;

use \Steel\Container;
use \Steel\Cache as SteelCache;
use \Steel\Cache\APC;

/**
 * Cache
 *
 * ${DESCRIPTION}
 *
 * @module Injectors
 * @submodule Cache
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
trait Cache
{
    /**
     * @return SteelCache
     */
    protected function getCache( )
    {
        if ( Container::isStored('Cache') )
        {
            return Container::getStored('Cache');
        }

        return Container::store('Cache', new SteelCache(new APC()));
    }
}
