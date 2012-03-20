<?php

namespace Apex\Renderers;

use Apex\Interfaces\Renderer;

class XSLT implements Renderer
{
  public function getDataType( )
  {
    return 'XML';
  }

  public function getTemplateType( )
  {
    return 'XSLT';
  }

  public function render( $data, $template )
  {
    echo htmlspecialchars( $data->saveXML( ) );
    echo __METHOD__; 
    echo "<br>";
  }
}
