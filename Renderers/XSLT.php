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

    /**
     * @param \DOMDocument $data
     * @param $template
     * @return string
     */
    public function render( $data, $template)
    {
        $xslt = new \XSLTProcessor();
        $xslDoc = new \DOMDocument();
//        var_dump($template);
//        if ( $template == 'Base' )
//            echo debug_backtrace();
        $xslDoc->load($this->getConfig()->get()->directories->templates . $template . '.xsl');
        $xslt->importStylesheet($xslDoc);
//        echo htmlspecialchars($data->saveXML());
        return $xslt->transformToXml($data);
    }
}
