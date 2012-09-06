<?php

namespace Steel;

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

    protected function __construct( $config = null )
    {
        $this->config = $this->getConfig( $config );
        $this->response = $this->getResponse();
        $this->request = $this->getRequest();
        $this->router = $this->getRouter( $this->config->get()->routes );
    }

    public static function start( $config = null )
    {
        static $self;

        if (!isset( $self )) {
            $self = new self( $config );
        }

        return $self;
    }

    public function run()
    {
        if ($this->request->isConfig()) {
            $this->runConfig();
            return;
        }

        $route = $this->router->getRoute( $this->request );
        $route->follow();
    }

    public function runConfig()
    {
        $config = (array) $this->config->get();
        echo '<pre>';
        var_dump( $_SERVER, $_ENV );
        var_dump( $this->request->accepts( 'text/html' ) );
        var_dump( $this->request->accepts( 'application/json' ) );

        phpinfo();
    }
}
