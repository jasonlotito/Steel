<?php

namespace Steel\View\Data;

class XML extends \DOMDocument
{
    protected $root;

    public function __construct($rootName)
    {
        parent::__construct('1.0', 'UTF-8');
        $this->root = $this->createElement($rootName);
        $this->appendChild($this->root);
    }

    public function setData($name, $value)
    {
        $this->setDataWithParent($name, $value);
    }

    public function setDataWithParent($name, $value, $parentNode = null)
    {
        if (is_array($value)) {
            foreach ($value as $val) {
                $this->setDataWithParent(
                    $name,
                    $val
                );
            }
        } else {
            $ele = $this->createElement($name);
            $ele->appendChild($this->createCDATASection($value));

            if (isset( $parentNode )) {
                $parentNode->appendChild($ele);
            } else {
                $this->root->appendChild($ele);
            }
        }
    }

    private function inflector($word)
    {
        $rules = array(
            'ss' => false,
            'os' => 'o',
            'ies' => 'y',
            'xes' => 'x',
            'oes' => 'o',
            'ies' => 'y',
            'ves' => 'f',
            's' => ''
        );

        foreach (array_keys($rules) as $key) {
            if (substr($word, ( strlen($key) * -1 )) != $key) {
                continue;
            }

            if ($key === false) {
                return $word;
            }

            return substr($word, 0, strlen($word) - strlen($key)) . $rules[$key];
        }

        return $word;
    }
}
