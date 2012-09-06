<?php

namespace Steel\Injectors\View;

use \Steel\Container;
use \Steel\View\Template as SteelTemplate;

trait Template
{
  public function getTemplate( $viewName )
  {
    $templateName = $viewName . 'Template';

    if ( Container::available( $templateName ) )
    {
      return Container::get( $templateName );
    }

    return Container::set( $templateName, SteelTemplate::create( $templateName ) );
  }
}
