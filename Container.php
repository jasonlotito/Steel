<?php

namespace Steel;

class Container
{
  protected static $objects = array( );

  public static function available( $class )
  {
    return isset( self::$objects[ $class ] );
  }

  public static function set( $name, $object )
  {
    self::$objects[ $name ] = $object;

    return $object;
  }

  public static function get( $name )
  {
    if ( self::available( $name ) )
    {
      return self::$objects[ $name ];
    }

    throw new InvalidArgumentException( "No $name found!" );
  }
}
