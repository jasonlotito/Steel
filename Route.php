<?php

namespace Steel;

use Steel\Interfaces\Route as IRoute;

/**
 * Route
 */
class Route implements IRoute
{
    const EXCEPTION_MISSING_ENTITY_OR_ACTION = 'Missing entity (%s) or action (%s).';
    const EXCEPTION_ENTITY_METHOD_NOT_FOUND = '%s::%s not found!';
    use Injectors\Config;

    /**
     * @var string
     */
    protected $entity;

    /**
     * @var string
     */
    protected $action;

    /**
     * Constructor
     *
     * @param string $entity Entities name
     * @param string $action Actions name
     */
    public function __construct($entity, $action)
    {
        if (empty( $entity ) || empty( $action )) {
            throw new \InvalidArgumentException( sprintf(self::EXCEPTION_MISSING_ENTITY_OR_ACTION, $entity, $action) );
        } else {
            $this->entity = $entity;
            $this->action = $action;
        }
    }

    /**
     * @throws \Exception
     */
    public function follow()
    {
        $routeData = [ ];
        try {
            $config = $this->getConfig();
            $namespace = $config->get()->namespace;

            $route = $config->get()
                ->route
                ->{$this->action}
                ->{$this->entity};

            $routes = $config->get()->routes;

//            var_dump($config->get());
            $routes = $config->get()->route;
//            var_dump($all);

//            var_dump($routes['route']);
            foreach( $routes as $key =>  $route )
            {
                $this->parseRouteDetails($route, $routeData);
            }

            $class = $config->get()->namespace . '\\' . $route->class;
            $method = (string) isset( $route->method ) ? $route->method : $this->action;

            try {
                if (class_exists($class)) {
                    $entity = new $class();

                    if (!method_exists($entity, $method)) {
                        throw new \RuntimeException( sprintf(
                            self::EXCEPTION_ENTITY_METHOD_NOT_FOUND,
                            $entity,
                            $method
                        ) );
                    }
                    $entity->$method();
                }
            } catch ( \Exception $e ) {
                echo $e->getMessage();
            }
        } catch ( \InvalidArgumentException $e ) {
            throw new \RuntimeException( $e->getMessage() );
        }
    }

    protected function parseRouteDetails( $route, &$routeData )
    {
        var_dump('route', $route);

        $routeData[(string)$route->path] = $route;
    }

    /**
     * @param Interfaces\Config $config
     */
    protected function findRouteInConfig(Interfaces\Config $config)
    {
    }
}
