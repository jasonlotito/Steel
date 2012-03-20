<?php

namespace Apex;

class Renderer
{
  /**
   * Return a renderer based on type
   *
   * @return Apex\Interfaces\Renderer
   */
  public static function fromEngineType( $renderingEngineType )
  {
    $renderClassName = 'Apex\\Renderers\\' . $renderingEngineType;
    if ( class_exists( $renderClassName ) )
    {
      return new $renderClassName( );
    }
  }
}
