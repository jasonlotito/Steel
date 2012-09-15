<?php

namespace Steel;

/**
 * Controller
 */
abstract class Controller
{
    use Injectors\View;
    use Injectors\Request;
    use Injectors\Response;
    use Injectors\Config;
    use Injectors\Event;

    const EVENT_CONTROLLER_FLUSHED = 'ControllerFlushed';

    protected $request;

    protected $response;

    protected $view;

    protected $templateName = 'Default';

    public function __construct()
    {
        $this->request = $this->getRequest();
        $this->response = $this->getResponse();
        $this->view = $this->getView($this->templateName);
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    protected function attach($name, $value)
    {
        return $this->view->attach($name, $value);
    }

    protected function output()
    {
        $this->view->output();
        $this->response->flush();
        $this->sendEvent(self::EVENT_CONTROLLER_FLUSHED);
    }
}
