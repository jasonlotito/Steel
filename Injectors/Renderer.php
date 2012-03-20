<?php

namespace Apex\Injectors;
use Apex\Container;
use Apex\Renderer as ApexRenderer;

trait Renderer
{
  protected function getRenderer( $renderingEngineType )
  {
    $rendererName = 'Renderer' . $renderingEngineType;
    if ( Container::available( $rendererName ) )
    {
      return Container::get( $rendererName );
    }

    return Container::set( $rendererName, ApexRenderer::fromEngineType( $renderingEngineType ) );
  }
}
