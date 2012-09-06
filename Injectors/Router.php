<?php

namespace Steel\Injectors;
use Steel\Container;
use Steel\Router as SteelRouter;
trait Router
{
  protected function getRouter( $routes )
  {
    if ( Container::available( 'Router' ) )
    {
      return Container::get( 'Router' );
    }

    return Container::set( 'Router', new SteelRouter( $routes ) );
  }
}
