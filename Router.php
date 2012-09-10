<?php

namespace Steel;

/**
 * Router
 */
class Router implements Interfaces\Router
{
    use Injectors\Config;

    /**
     * Routes
     *
     * @array
     */
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;

        var_dump($routes);

        $config = $this->getConfig();

        foreach ( $config->route as $route )
        {
            $this->parseRoute($route);
        }
    }

    protected function parseRoute( $route )
    {

    }

    /**
     * @param Interfaces\Request $request
     * @return Interfaces\Route
     */
    public function getRoute(Interfaces\Request $request)
    {
        $action = $request->getAction();
        $entity = $request->getEntity();

        return new Route( $entity, $action );
    }
}
