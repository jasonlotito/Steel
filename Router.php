<?php

namespace Steel;

/**
 * Router
 */
class Router implements Interfaces\Router
{
    /**
     * Routes
     *
     * @array
     */
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param Interfaces\Request $request
     * @return Route
     */
    public function getRoute(Interfaces\Request $request)
    {
        $action = $request->getAction();
        $entity = $request->getEntity();

        return new Route( $entity, $action );
    }
}
