<?php

namespace Steel\Injectors;

use \Steel\Container;
use \Steel\View as SteelView;

trait View
{
  public function getView( $viewName = 'View' )
  {
    if ( Container::available( $viewName ) )
    {
      return Container::get( $viewName );
    }

    return Container::set( $viewName, SteelView::create( $viewName ) );
  }
}
