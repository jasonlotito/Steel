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
    $xslt = new \XSLTProcessor( );
    $xslDoc = new \DOMDocument( );
    $xslDoc->load( '../app/AppTest/XSL/Home.xsl', LIBXML_NOCDATA );
    $xslt->importStylesheet( $xslDoc );

    echo $xslt->transformToXML( $data );
  }
}
