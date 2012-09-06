<?php

namespace Steel\Injectors;
use Steel\Container;
use Steel\Router as SteelRouter;
trait Router
{
  protected function getRouter( $routes )
  {
    if ( Container::isStored( 'Router' ) )
    {
      return Container::getStored( 'Router' );
    }

    return Container::store( 'Router', new SteelRouter( $routes ) );
  }
}
