<?php

namespace Steel\Renderers;

use Steel\Interfaces\Renderer;

class XSLT implements Renderer
{
    use
    \Steel\Injectors\Config;

    public function getDataType()
    {
        return 'XML';
    }

    public function getTemplateType()
    {
        return 'XSLT';
    }

    public function render( $data, $template )
    {
        $xslt = new \XSLTProcessor();
        $xslDoc = new \DOMDocument();
        $xslDoc->load( $this->getConfig()->get()->directories->templates . $template . '.xsl' );
        $xslt->importStylesheet( $xslDoc );

        return $xslt->transformToXML( $data );
    }
}
