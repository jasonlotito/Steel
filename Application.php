<?php

namespace Steel;

use Steel\Injectors\Request;
use Steel\Injectors\Response;
use Steel\Injectors\Config;
use Steel\Injectors\Router;

use Steel\Container\Injector as Container;

/**
 * Application
 */
class Application implements Interfaces\Application
{
    use Request;
    use Response;
    use Config;
    use Router;
    use Container;

    /**
     * Response
     *
     * @var Response;
     */
    protected $response;

    /**
     * Request
     *
     * @var Request;
     */
    protected $request;

    /**
     * Request
     *
     * @var Request;
     */
    protected $router;

    /**
     * Application Config
     *
     * @var array
     */
    protected $applicationConfig;

    protected $container;

    /**
     * @param null $config
     */
    protected function __construct($config = null)
    {
        $this->container = $this->getContainer();
        $this->applicationConfig = $config;
        $this->config = $this->getConfig($this->getCoreConfigurationFile());
        $this->response = $this->getResponse();
        $this->request = $this->getRequest();
        $contained = $this->getContainer()->whatsContained();
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

        if (!isset( $self )) {
            $self = new self( $config );
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

     */
    public function runConfig()
    {
        $config = (array) $this->config->get();
        echo '<pre>';
        var_dump($_SERVER, $_ENV);
        var_dump($this->request->accepts('text/html'));
        var_dump($this->request->accepts('application/json'));

        phpinfo();
    }

    /**
     * Is the application in configuration mode
     *
     * @return boolean
     */
    public function isApplicationInConfigMode()
    {
        return $this->applicationConfig['applicationConf'];
    }

    public function isApplicationInDebugMode()
    {
        return $this->applicationConfig['applicationDebug'];
    }

    public function applicationDirectory()
    {
        return $this->applicationConfig['applicationDir'];
    }

    public function applicationEnvironment()
    {
        return $this->applicationConfig['applicationEnv'];
    }

    public function getCoreConfigurationFile()
    {
        return
            $this->getConfigurationDirectory()
            . DIRECTORY_SEPARATOR
            . $this->applicationConfig['configCore']
            . $this->getConfigurationExtension();
    }

    public function getConfigurationDirectory()
    {
        return $this->applicationConfig['configDir'];
    }

    public function getConfigurationExtension()
    {
        return $this->applicationConfig['configExt'];
    }
}
