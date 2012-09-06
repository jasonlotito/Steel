<?php

namespace Steel\Injectors;
use \Steel\Container;
use \Steel\Response as SteelResponse;

trait Response
{
  protected function getResponse( )
  {
    if ( Container::available( 'Response' ) )
    {
      return Container::get( 'Response' );
    }

    return Container::set( 'Response', new SteelResponse( ) );
  }
}
