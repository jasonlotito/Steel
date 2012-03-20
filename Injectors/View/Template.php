<?php

namespace Apex\Injectors\View;

use \Apex\Container;
use \Apex\View\Template as ApexTemplate;

trait Template
{
  public function getTemplate( $viewName )
  {
    $templateName = $viewName . 'Template';

    if ( Container::available( $templateName ) )
    {
      return Container::get( $templateName );
    }

    return Container::set( $templateName, ApexTemplate::create( $templateName ) );
  }
}
