<?php

namespace Steel;

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

    public function getRoute(Interfaces\Request $request)
    {
        $action = $request->getAction();
        $entity = $request->getEntity();

        return new Route( $entity, $action );
    }
}
