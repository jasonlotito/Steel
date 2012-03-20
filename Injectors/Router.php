<?php

namespace Apex\Injectors;
use Apex\Container;
use Apex\Router as ApexRouter;
trait Router
{
  protected function getRouter( $routes )
  {
    if ( Container::available( 'Router' ) )
    {
      return Container::get( 'Router' );
    }

    return Container::set( 'Router', new ApexRouter( $routes ) );
  }
}
