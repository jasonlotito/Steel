<?php

namespace Apex\Renderers;

use Apex\Interfaces\Renderer;

class XSLT implements Renderer
{
  use
    \Apex\Injectors\Config;

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
    $xslt = new \XSLTProcessor( );
    $xslDoc = new \DOMDocument( );
    $xslDoc->load( $this->getConfig( )->get( )->directories->templates . $template . '.xsl' );
    $xslt->importStylesheet( $xslDoc );
    
    return $xslt->transformToXML( $data );
  }
}
