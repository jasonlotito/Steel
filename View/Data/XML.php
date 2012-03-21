<?php

namespace Apex\View\Data;

class XML extends \DOMDocument
{
  protected $root;

  public function __construct( $rootName )
  {
    parent::__construct( '1.0', 'UTF-8' );
    $this->root = $this->createElement( $rootName ); 
    $this->appendChild( $this->root );
  }

  public function setData( $name, $value, $parentNode = null )
  {
    if ( is_array( $value ) ) 
    {
      $newNode = $this->createElement( $name );
      $singularName = null;

      if ( isset( $value[ 0 ] ) )
      {
        $singularName = $this->inflector( $name );
      }

      foreach ( $value as $key => $val )
      {
        $this->setData( isset( $singularName ) ? $singularName : $key, $val, $newNode ); 
      }

      $this->root->appendChild( $newNode );
      return;
    }

    $ele = $this->createElement( $name );
    $ele->appendChild( $this->createCDATASection( $value ) );

    if ( isset( $parentNode ) )
    {
      $parentNode->appendChild( $ele );
    }
    else
    {
      $this->root->appendChild( $ele );
    }
  }

  private function inflector( $word )
  {
    $rules = array( 
      'ss' => false, 
      'os' => 'o', 
      'ies' => 'y', 
      'xes' => 'x', 
      'oes' => 'o', 
      'ies' => 'y', 
      'ves' => 'f', 
      's' => '');

    foreach( array_keys( $rules ) as $key )
    {
      if ( substr( $word, ( strlen( $key ) * -1 ) ) != $key ) 
      {
        continue;
      }

      if ( $key === false)
      { 
        return $word;
      }

      return substr( $word, 0, strlen( $word ) - strlen( $key ) ) . $rules[ $key ]; 
    }

    return $word;
  }
}
