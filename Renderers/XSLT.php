<?php

namespace Steel\Renderers;

use Steel\Interfaces\Renderer;
use Steel\Injectors\Config;
use \XSLTProcessor;
use \DOMDocument;

class XSLT implements Renderer
{
    use Config;

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
    public function render($data, $template)
    {
        $xslt = new XSLTProcessor();
        $xslDoc = new DOMDocument();
        $xslDoc->load($this->getConfig()->get()->templatesDir . $template . '.xsl');
        $xslt->importStylesheet($xslDoc);
//        echo htmlspecialchars($data->saveXML());
        return $xslt->transformToXml($data);
    }
}
