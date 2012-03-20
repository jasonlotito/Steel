<?php

namespace Apex\Interfaces;

interface Renderer
{
  public function getDataType( );
  public function getTemplateType( );
  public function render( );
}
