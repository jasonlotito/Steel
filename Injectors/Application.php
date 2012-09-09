<?php

use Steel\Injectors;

use \Steel\Container;
use \Steel\Application as SteelApplication;

trait Application
{
    /**
     * Get Application
     */
    public function getApplication()
    {
        if ( Container::isStored('Application') )
        {
            Container::store('Application');
        }
    }
}
