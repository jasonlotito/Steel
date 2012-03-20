<?php

namespace Apex\Injectors;

use \Apex\Container;
use \Apex\View as ApexView;

trait View
{
  public function getView( $viewName = 'View' )
  {
    if ( Container::available( $viewName ) )
    {
      return Container::get( $viewName );
    }

    return Container::set( $viewName, ApexView::create( $viewName ) );
  }
}
