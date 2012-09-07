<?php

namespace Steel;

use Steel\Container;
use Steel\Route as SteelRoute;
use Steel\Interfaces\Route as IRoute;

/**
 * Route Injector
 */
trait Route
{
    /**
     * @return IRoute
     */
    public function getRoute( $entity, $action )
    {
        $key = $entity . $action;

        if ( Container::isStored( $key ) )
        {
            Container::getStored( $key );
        }

        return Container::store( $key, new SteelRoute( $entity, $action ) );
    }
}
