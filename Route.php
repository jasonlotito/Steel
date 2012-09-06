<?php

namespace Steel;

class Route implements Interfaces\Route
{
    use
    Injectors\Config;

    protected $entity;

    protected $action;

    /**
     * Constructor
     *
     * @param string $entity Entities name
     * @param string $action Actions name
     */
    public function __construct($entity, $action)
    {
        $this->entity = $entity;
        $this->action = $action;
    }

    public function follow()
    {
        $config = $this->getConfig();
        $namespace = $config->get()->namespace;

        $route = $config->get()->routes->{$this->action}->{$this->entity};
        $class = $config->get()->namespace . '\\' . $route->class;
        $method = (string) isset( $route->method ) ? $route->method : $this->action;

        try {
            if (class_exists($class)) {
                $entity = new $class();

                if (!method_exists($entity, $method)) {
                    throw new \Exception( "$class::$method not found!" );
                }
                $entity->$method();
            }
        } catch ( \Exception $e ) {
            echo $e->getMessage();
        }
    }

    protected function findRouteInConfig(Interfaces\Config $config)
    {
    }
}
