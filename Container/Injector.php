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
     * @var
     */
    protected $container;

    /**
     * @param string $containerName
     * @return Container
     */
    protected function getContainer($containerName = 'Container')
    {
        if (Container::isStored($containerName)) {
            return $this->container = Container::getStored($containerName);
        }

        return $this->container = Container::store($containerName, new Container());
    }
}
