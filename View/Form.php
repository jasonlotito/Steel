<?php

namespace Steel\View;

    /**
     * Form
     * ${DESCRIPTION}
     *
     * @module ${MODULE}
     * @submodule ${SUBMODULE}
     * @author Jason Lotito <jasonlotito@gmail.com>
     */
/**

 */
class Form
{
    use \Steel\Injectors\View;
    use \Steel\Injectors\Config;

    /**
     * @var \Steel\View
     */
    protected $view;

    /**
     * @var int
     */
    protected $elementCount = 0;

    /**
     * @var array
     */
    protected $elements;

    /**
     * @var array
     */
    protected $options;

    /**
     * Constructor
     */
    public function __construct()
    {
        $dir = (string) $this->getConfig()->get()->steel . '/Form';
        $this->view = $this->getView($dir);
    }

    /**
     * @param $label
     * @param null $name
     * @param string $value
     * @return self
     */
    public function addInput($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'InputText');
    }

    protected function addElement($label, $name, $value, $element)
    { // @todo Move this into Element Classes
        $placeholder = '';

        if (is_array($label)) {
            $options = $label;
            unset( $label );
            $name = $this->getOption('name', $options);
        } else {
            $options = [
                'label' => $label,
                'name' => $name,
                'value' => $value,
            ];
        }

        $this->elementCount++;

        $elements = [
            'name' => isset( $name ) ? $name : 'input' . $this->elementCount,
            'type' => $element,
        ];

        $elements = array_merge($options, $elements);
//        var_dump($elements);

        $this->elements[] = $elements;
    }

    public function addTextArea($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'TextArea');
    }

    protected function getOption($name, $options, $default = '')
    {
        return isset( $options[$name] ) ?
            $options[$name] : $default;
    }

    public function render()
    {
        $this->view->attach('elements', $this->elements);
        return $this->view->render();
    }

    /**

     */
    public function output()
    {
        echo $this->render();
    }
}
