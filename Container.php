<?php

namespace Steel;

use Steel\Interfaces\Container as IContainer;

/**
 * Container
 *
 * @module Container
 */
class Container implements IContainer
{
    const EXCEPTION_NO_NAME_FOUND = 'No %s found.';

    protected static $objects = array();

    /**
     * @param string $class
     * @return bool
     */
    public static function isStored($class)
    {
        return isset( self::$objects[$class] );
    }

    /**
     * @param string $name
     * @param mixed $object
     * @return mixed
     */
    public static function store($name, $object)
    {
        self::$objects[$name] = $object;

        return $object;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public static function getStored($name)
    {
        if (self::isStored($name)) {
            return self::$objects[$name];
        }

        throw new \InvalidArgumentException(sprintf(self::EXCEPTION_NO_NAME_FOUND, $name));
    }

    public static function whatsContained()
    {
        return array_keys(self::$objects);
    }
}
