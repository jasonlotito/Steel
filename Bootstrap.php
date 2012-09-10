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
        $this->registerErrorHandler();
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

    protected function registerErrorHandler()
    {
        set_error_handler(array($this, 'errorHandler'));
    }

    /**
     * Auto Loader
     *
     * @param string $name
     */
    public function autoLoad($name)
    {
        require_once str_replace(array('\\', '_'), '/', $name) . $this->fileExtension;
    }

    public function errorHandler( $severity, $message, $fileName, $lineNumber )
    {
        if ( error_reporting() == 0)
        {
            return;
        }

        if ( error_reporting() & $severity )
        {
            throw new \ErrorException($message, 0, $severity, $fileName, $lineNumber);
        }
    }
}
