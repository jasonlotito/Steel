<?php

namespace Apex\View;

class Data
{
  public static function build ( $type, $name )
  {
    $className = "\\Apex\\View\\Data\\$type";
    if ( class_exists( $className ) )
    {
      return new $className( $name );
    }

    throw new InvalidArgumentExcpetion( "$type doesn't exist in Apex\\View\\Data" );
  }
}
