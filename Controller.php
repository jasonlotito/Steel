<?php

namespace Steel;

use Steel\Injectors\View as ViewInjector;
use Steel\Injectors\Request as RequestInjector;
use Steel\Injectors\Response as ResponseInjector;
use Steel\Injectors\Config as ConfigInjector;
use Steel\Injectors\Event as EventInjector;

use Steel\Controller\Events\Flushed;

/**
 * Controller
 */
abstract class Controller
{
    use ViewInjector;
    use RequestInjector;
    use ResponseInjector;
    use ConfigInjector;
    use EventInjector;

    /**

     */
    const EVENT_CONTROLLER_FLUSHED = 'ControllerFlushed';

    /**
     * @var Interfaces\Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var mixed
     */
    protected $view;

    /**
     * @var string
     */
    protected $templateName = 'Default';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->request = $this->getRequest();
        $this->response = $this->getResponse();
        $this->view = $this->getView($this->templateName);
    }

    protected function setTemplate( $name )
    {
        $this->view->setTemplate( $name );
    }


    /**
     * @param $view
     * @return void
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    protected function attach($name, $value)
    {
        return $this->view->attach($name, $value);
    }

    /**
     * Performs the output
     *
     * @return void
     */
    protected function output()
    {
        $this->view->output();
        $this->response->flush();
        $this->sendEvent(new Flushed());
    }
}
