<?php

namespace Apex\Injectors;

use Apex\Container;
use Apex\Config as ApexConfig;

trait Config
{
  /**
   * Gets a configuration object
   *
   * @return \Apex\Interfaces\Config;
   */
  protected function getConfig( $configFile = null )
  {
    if ( Container::available( 'Config' ) && $configFile == null )
    {
      return Container::get( 'Config' );
    }

    if ( isset( $configFile ) )
    { 
      $containerKey = 'Config:' . $configFile;
      $isDefaultSet = Container::available( 'Config' );
      $isCustomSet = Container::available( $containerKey );

      if ( $isCustomSet )
      {
        return Container::get( $containerKey );
      }

      $config = new ApexConfig( $configFile );

      if ( $isDefaultSet )
      {
        return Container::set( $containerKey, $config );
      }
      else
      {
        Container::set( 'Config', $config );
        return Container::set( $containerKey, $config );
      }
    }

    throw new \InvalidArgumentException( "Config file '$configFile' is not set" );
  }
}
