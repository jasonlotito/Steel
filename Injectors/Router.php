<?php

namespace Steel\Injectors;

use Steel\Container;
use Steel\Router as SteelRouter;
use Steel\Interfaces\Router as IRouter;

/**
 * Router Trait
 */
trait Router
{
    /**
     * @param $routes
     * @return IRouter
     */
    protected function getRouter($routes)
    {
        if (Container::isStored('Router')) {
            return Container::getStored('Router');
        }

        return Container::store('Router', new SteelRouter( $routes ));
    }
}
