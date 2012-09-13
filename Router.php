<?php

namespace Steel;

/**
 * Router
 */
class Router implements Interfaces\Router
{
    use Injectors\Config;
    use Injectors\Cache;

    /**
     * Routes
     *
     * @array
     */
    protected $routes = [ ];

    protected $entities = [ ];

    protected $appendPath = '';

    public function __construct($routes)
    {
        // @todo Store as object var
        $config = $this->getConfig();

        if (isset( $config )) {
            $this->appendPath = $config->routerDefaults->pathAppend;
        }

        foreach ($config->route as $route) {
            $this->parseRoute($route);
        }

        $this->entities = array_keys($this->routes);
    }

    protected function parseRoute($route, $path = '')
    {
        $fullPath = $path . $route->path;
        $this->routes[$fullPath] = $route;

        if (isset( $route->route )) {
            foreach ($route->route as $subRoute) {
                $this->parseRoute($subRoute, $fullPath);
            }
        }
    }

    /**
     * @param Interfaces\Request $request
     * @return Interfaces\Route
     */
    public function getRoute(Interfaces\Request $request)
    {
        $action = $request->getAction();
        $entity = $request->getEntity();

        $actionEntity = $action . ':' . $entity;
        $handler = $this->getCache()->get($actionEntity);

        if (!$handler) {
            foreach ($this->entities as $entityKey) {
                $entityTest = "|^$entityKey{$this->appendPath}$|i";
                $match = preg_match($entityTest, $entity, $matches);

                if ($match) {
                    $entityUsed = $this->routes[$entityKey];

                    $handler = $this->buildHandler($entityUsed, $entity, $action);

                    $this->getCache()->set($actionEntity, $handler, 10);
                }
            }
        }

        return new Route( $handler['class'], $handler['function'] );
    }

    protected function buildHandler($entityUsed, $entity, $action)
    {
        $handler = [
            'class' => $this->buildHandlerClass($entityUsed, $entity),
            'function' => $this->buildHandlerFunction($entityUsed, $action)
        ];
        return $handler;
    }

    protected function buildHandlerFunction($entityUsed, $action)
    {
        return isset( $entityUsed->method ) && isset( $entityUsed->method->function ) ?
            (string) $entityUsed->method->function : $this->generatMagicMethodName($action);
    }

    protected function buildHandlerClass($entityUsed, $entity)
    {
        return $this->getConfig()->routerDefaults->namespace .
            ( isset( $entityUsed->method ) && isset( $entityUsed->method->class ) ?
                (string) $entityUsed->method->class : $this->generateMagicEntityClassName($entity) );
    }

    protected function generatMagicMethodName($action)
    {
        if (
            // We shouldn't be using getConfig() each time
            isset( $this->getConfig()->routerDefaults ) &&
            isset( $this->getConfig()->routerDefaults->methodFunctions ) &&
            isset( $this->getConfig()->routerDefaults->methodFunctions->{$action} )
        ) {

            return (string) $this->getConfig()->routerDefaults->methodFunctions->{$action};
        }

        return strtolower($action);
    }

    protected function generateMagicEntityClassName($entity)
    {
        // Not crazy about this setup
        return
            str_replace( // Replace spaces with \\ for namespaces and class
                ' ',
                '\\',
                ucwords( // Capitalize Each word
                    str_replace(
                        '/',
                        ' ', //Replace / with _
                        trim( // Trim off /
                            $entity,
                            '/'
                        )
                    )
                )
            );
    }
}
