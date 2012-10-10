<?php

namespace Steel;

use Steel\Injectors\View\Template as TemplateInjector;
use Steel\Injectors\View\Data as DataInjector;
use Steel\Injectors\Config as ConfigInjector;
use Steel\Injectors\Renderer as RendererInjector;

/**

 */class View
{
    use TemplateInjector;
    use DataInjector;
    use ConfigInjector;
    use RendererInjector;

    /**
     * @var Interfaces\Renderer
     */
    protected $renderer;

    /**
     * @var mixed
     */
    protected $template;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Interfaces\Config
     */
    protected $config;

    /**
     * @param $name
     */
    protected function __construct($name)
    {
        $this->config = $this->getConfig()->get();
        $this->name = stripslashes(basename($name));
        $this->setTemplate($name);
        $this->renderer = $this->getRenderer($this->config->renderer);
        $this->data = $this->getData($this->name, $this->renderer->getDataType());
        $this->baseTemplate = $this->config->baseTemplate;
    }

    /**
     * Set the template name we will be using
     *
     * @param string $name
     * @return void
     */
    public function setTemplate($name)
    {
        $this->template = str_replace('\\', '/', $name);
    }

    /**
     * @param $name
     * @return View
     */
    public static function create($name)
    {
        return new self( $name );
    }

    /**
     * @param Interfaces\Renderer $renderer
     */
    public function setRenderer(Interfaces\Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param $name
     * @param $value
     */
    public function attach($name, $value)
    {
        $this->data->setData($name, $value);
    }

    /**

     */
    public function render()
    {
        return $this->renderer->render($this->data, $this->template);
    }

    /**

     */
    public function output()
    {
        echo $this->render();
    }
}
