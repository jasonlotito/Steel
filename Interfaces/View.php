<?php

namespace Apex;

interface View
{
  public static function create( $view, $name = '' );
  public function attach( $name, $value );
}
