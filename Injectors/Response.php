<?php

namespace Apex\Injectors;
use \Apex\Container;
use \Apex\Response as ApexResponse;

trait Response
{
  protected function getResponse( )
  {
    if ( Container::available( 'Response' ) )
    {
      return Container::get( 'Response' );
    }

    return Container::set( 'Response', new ApexResponse( ) );
  }
}
