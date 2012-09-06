<?php

namespace Steel\Injectors\View;

use \Steel\Container;
use \Steel\View\Data as SteelData;

trait Data
{
  public function getData( $viewName, $type )
  {
    $dataName = $viewName . 'Data';

    if ( Container::available( $dataName ) )
    {
      return Container::get( $dataName );
    }

    return Container::set( $dataName, SteelData::build( $type, $viewName ) );
  }
}
