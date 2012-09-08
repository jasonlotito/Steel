<?php

namespace Steel;

// Includes
require_once __DIR__ . '/Interfaces/Bootstrap.php';

use Steel\Interfaces\Bootstrap as IBootstrap;

/**
 * Bootstrap File
 */
class Bootstrap implements IBootstrap
{
    protected $fileExtension = '.php';

    /**
     * Construct
     */
    protected function __construct()
    {
        $this->register();
    }

    /**
     * Set the include path
     *
     * @param array $paths
     * @return self
     */
    public function setIncludePath($paths = array())
    {
        set_include_path(
            implode(PATH_SEPARATOR, $paths) . PATH_SEPARATOR .
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR .
            get_include_path()
        );

        return $this;
    }

    /**
     * Initialize
     *
     * @return self
     */
    public static function init($name = 'default')
    {
        static $bootstrap = array();

        if (!isset($bootstrap[$name])) {
            $bootstrap[$name] = new self();
        }

        return $bootstrap[$name];
    }

    /**
     * Register an SPL AutoLoad Function
     */
    protected function register()
    {
        spl_autoload_register(array($this, 'autoLoad'));
    }

    /**
     * Autoloader
     *
     * @param string $name
     */
    public function autoLoad($name)
    {
        require_once str_replace(array('\\', '_'), '/', $name) . $this->fileExtension;
    }
}
