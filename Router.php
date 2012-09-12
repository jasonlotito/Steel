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
//        $this->routes = $routes;

        $config = $this->getConfig();

        if ( isset($config) )
        {
            $this->appendPath = $config->routerDefaults->pathAppend;
//            var_dump($config->routerDefaults->pathAppend);
        }

        foreach ( $config->route as $route )
        {
            $this->parseRoute($route);
        }

        $this->entities = array_keys($this->routes);
    }

    protected function parseRoute( $route, $path = '' )
    {
        $fullPath = $path . $route->path;
        $this->routes[$fullPath] = $route;


        if ( isset($route->route) )
        {
            foreach ( $route->route as $subRoute )
            {
                $this->parseRoute( $subRoute, $fullPath );
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

        echo '<ol>';
        foreach ( $this->entities as $entityTest )
        {
            echo '<li>' . "$entityTest : " . $this->getCache()->get($entityTest);
        }
        echo '</ol>';

        foreach ($this->entities as $entityTest) {
            $entityTest = "|^$entityTest{$this->appendPath}$|";
            $match = preg_match($entityTest, $entity);

            $cache = "<pre>$match, $entityTest, $entity</pre>";

            var_dump($this->getCache()->set($entity, $cache));
        }

        die;

//        return new Route( $entity, $action );
    }
}
