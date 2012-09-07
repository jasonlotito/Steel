<?php

namespace Steel;

/**
 *
 */
class Application implements Interfaces\Application
{
    use Injectors\Request;
    use Injectors\Response;
    use Injectors\Config;
    use Injectors\Router;

    /**
     * Response
     *
     * @return Response;
     */
    protected $response;

    /**
     * Request
     *
     * @return Request;
     */
    protected $request;

    /**
     * Request
     *
     * @return Request;
     */
    protected $router;

    /**
     * @param null $config
     */
    protected function __construct($config = null)
    {
        $this->config = $this->getConfig($config);
        $this->response = $this->getResponse();
        $this->request = $this->getRequest();
        $this->router = $this->getRouter($this->config->get()->routes);
    }

    /**
     * @static
     * @param null $config
     * @return Application
     */
    public static function start($config = null)
    {
        static $self;

        if (!isset($self)) {
            $self = new self($config);
        }

        return $self;
    }

    /**
     * Run the application
     */
    public function run(Interfaces\Request $request = null)
    {
        $route = $this->router->getRoute($request ? $request : $this->request);
        $route->follow();
    }

    /**
     *
     */
    public function runConfig()
    {
        $config = (array)$this->config->get();
        echo '<pre>';
        var_dump($_SERVER, $_ENV);
        var_dump($this->request->accepts('text/html'));
        var_dump($this->request->accepts('application/json'));

        phpinfo();
    }
}
