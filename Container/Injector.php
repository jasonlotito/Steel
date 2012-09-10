<?php

namespace Steel\Container;

use Steel\Container;

/**
 * Injector
 * Injector for Containers
 *
 * @module Container
 * @submodule Injector
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
trait Injector
{

    /**
     * @param string $containerName
     * @return Container
     */
    protected function getContainer($containerName = 'Container')
    {
        if (Container::isStored($containerName)) {
            return Container::getStored($containerName);
        }

        return Container::store($containerName, new Container());
    }
}
