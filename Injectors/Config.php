<?php

namespace Steel\Injectors;

use Steel\Container;
use Steel\Config as SteelConfig;

trait Config
{
    /**
     * Gets a configuration object
     *
     * @return \Steel\Interfaces\Config;
     */
    protected function getConfig( $configFile = null )
    {
        if (Container::isStored( 'Config' ) && $configFile == null) {
            return Container::getStored( 'Config' );
        }

        if (isset( $configFile )) {
            $containerKey = 'Config:' . $configFile;
            $isDefaultSet = Container::isStored( 'Config' );
            $isCustomSet = Container::isStored( $containerKey );

            if ($isCustomSet) {
                return Container::getStored( $containerKey );
            }

            $config = new SteelConfig( $configFile );

            if ($isDefaultSet) {
                return Container::store( $containerKey, $config );
            } else {
                Container::store( 'Config', $config );
                return Container::store( $containerKey, $config );
            }
        }

        throw new \InvalidArgumentException( "Config file '$configFile' is not set" );
    }
}
