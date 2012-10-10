<?php

namespace Steel\View;

/**
 * Form
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

    public function addCheckbox($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'Checkbox');
    }

    public function addPassword($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'Password');
    }

    public function addButton($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'Button');
    }

    protected function addElement($label, $name = null, $value = '', $element = '')
    { // @todo Move this into Element Classes
        $placeholder = '';

        if (is_array($label)) {
            $options = $label;
            unset( $label );
            $name = $this->getOption('name', $options);
            $for = $id = $this->getOption('id', $options );
        } else {
            $options = [
                'label' => $label,
                'name' => $name,
                'value' => $value,
            ];
            $for = $id = '';
        }

        $this->elementCount++;

        $elements = [
            'name' => isset( $name ) ? $name : 'input' . $this->elementCount,
            'type' => $element,
            'for' => $for,
            'id' => $id,
        ];

        $elements = array_merge($options, $elements);
        $this->elements[] = $elements;
    }

    public function addTextArea($label, $name = null, $value = '')
    {
        $this->addElement($label, $name, $value, 'TextArea');
    }

    public function addSelect($label, $name, array $values, $selected = '', array $params = array())
    {
        foreach ($values as $key => $val) {
            $options[] = [
                'value' => $key,
                'label' => $val,
            ];
        }

        $options = [
            'label' => $label,
            'name' => $name,
            'value' => $options,
            'element' => 'Select',
            'selected' => $selected
        ];

        $options = array_merge($params, $options);

        $this->addElement($options, $name, $values, 'Select');
    }

    protected function getOption($name, $options, $default = '')
    {
        return isset( $options[$name] ) ?
            $options[$name] : $default;
    }

    public function render()
    {
        // @todo Better token creation along with session storage of token (not md5)
        $this->view->attach('token', md5(microtime()));
        $this->view->attach('elements', $this->elements);
        return $this->view->render();
    }

    /**
     * Output form
     *
     * @return string
     */
    public function output()
    {
        echo $this->render();
    }
}
