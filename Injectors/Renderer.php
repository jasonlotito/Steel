<?php

namespace Steel\Injectors;
use Steel\Container;
use Steel\Renderer as SteelRenderer;

trait Renderer
{
  protected function getRenderer( $renderingEngineType )
  {
    $rendererName = 'Renderer' . $renderingEngineType;
    if ( Container::available( $rendererName ) )
    {
      return Container::get( $rendererName );
    }

    return Container::set( $rendererName, SteelRenderer::fromEngineType( $renderingEngineType ) );
  }
}
