<?php

namespace Steel\Injectors;
use \Steel\Container;
use \Steel\Response as SteelResponse;

trait Response
{
  protected function getResponse( )
  {
    if ( Container::isStored( 'Response' ) )
    {
      return Container::getStored( 'Response' );
    }

    return Container::store( 'Response', new SteelResponse( ) );
  }
}
