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
