<?php

namespace Steel\Interfaces;

/**
 * Router Interface
 */
interface Router
{
    /**
     * @param $routes
     */
    public function __construct($routes);

    /**
     * @abstract
     * @param Request $request
     * @return Route
     */
    public function getRoute(Request $request);
}
