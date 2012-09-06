<?php

namespace Steel\Injectors;
use Steel\Container;
use Steel\Request as SteelRequest;
trait Request
{
  protected function getRequest( )
  {
    if ( Container::available( 'Request' ) )
    {
      return Container::get( 'Request' );
    }

    return Container::set( 'Request', new SteelRequest( ) );
  }
}
