<?php

namespace Apex\Injectors;
use Apex\Container;
use Apex\Request as ApexRequest;
trait Request
{
  protected function getRequest( )
  {
    if ( Container::available( 'Request' ) )
    {
      return Container::get( 'Request' );
    }

    return Container::set( 'Request', new ApexRequest( ) );
  }
}
