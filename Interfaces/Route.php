<?php

namespace Steel\Interfaces;

interface Route
{
  public function __construct( $entity, $action );
  public function follow( );
}
