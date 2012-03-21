<?php

namespace Apex\Injectors\View;

use \Apex\Container;
use \Apex\View\Data as ApexData;

trait Data
{
  public function getData( $viewName, $type )
  {
    $dataName = $viewName . 'Data';

    if ( Container::available( $dataName ) )
    {
      return Container::get( $dataName );
    }

    return Container::set( $dataName, ApexData::build( $type, $viewName ) );
  }
}
