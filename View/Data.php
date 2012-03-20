<?php

namespace Apex\View;

class Data extends \ArrayObject
{
  protected $dataName;

  public function __construct( $name )
  {
    parent::__construct( );
    $this->dataName = $name;  
  }  
}
