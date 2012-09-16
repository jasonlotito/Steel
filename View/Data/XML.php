<?php

namespace Steel\View\Data;

use \Steel\Interfaces\Data;
use \Steel\Helpers\String\Injector as StringInjector;

/**

 */
class XML extends \DOMDocument implements Data
{
    use StringInjector;

    /**
     * @var \DOMElement
     */
    protected $root;

    /**
     * Constructor
     *
     * @param string $rootName
     */
    public function __construct($rootName)
    {
        parent::__construct('1.0', 'UTF-8');
        $this->root = $this->createElement($rootName);
        $this->appendChild($this->root);
    }

    /**
     * @param string $name
     * @param array|string $value
     * @return void
     */
    public function setData($name, $value)
    {
        $this->setDataWithParent($name, $value);
    }

    /**
     * @param $name
     * @param $value
     * @param \DOMElement|null $parentNode
     * @return void
     */
    public function setDataWithParent($name, $value, $parentNode = null)
    {
        if (is_array($value)) {

            $createdElement = $this->createElement($name);

            foreach ($value as $key => $val) {
                $inflectedName = is_numeric($key) ? $name : $key;
                $this->setDataWithParent($inflectedName, $val, $createdElement);
            }

            if (isset( $parentNode )) {
                $parentNode->appendChild($createdElement);
            } else {
                $this->root->appendChild($createdElement);
            }
        } else {

            $createdElement = $this->createElement($this->inflect($name));
            $createdElement->appendChild($this->createCDATASection($value));

            if (isset( $parentNode )) {
                $parentNode->appendChild($createdElement);
            } else {
                $this->root->appendChild($createdElement);
            }
        }
    }

    /**
     * @param $word
     * @return string
     */
    private function inflect($word)
    {
        return $this->getStringHelper()->getInflection($word);
    }
}
