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
     */
    public function addInput($label, $name = null, $value = '')
    {
        $placeholder = '';

        if (is_array($label)) {
            $options = $label;
            unset($label);
            $label = $this->getOption('label', $options);
            $name = $this->getOption('name', $options);
            $value = $this->getOption('value', $options);
            $placeholder = $this->getOption('placeholder', $options);
        }

        $this->elementCount++;
        $this->elements[] = [
            'label' => $label,
            'name' => isset( $name ) ? $name : 'input' . $this->elementCount,
            'value' => $value,
            'type' => 'InputText',
            'placeholder' => $placeholder,
        ];
    }

    protected function getOption( $name, $options, $default = '' )
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
     *
     */
    public function output()
    {
        echo $this->render();
    }
}
