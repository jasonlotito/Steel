<?php

namespace Steel\Interfaces;

/**
 * Container
 *
 * Container Interface
 *
 * @module ${MODULE}
 * @submodule ${SUBMODULE}
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
interface Container
{
    /**
     * Whether or not the element named is stored in the Container
     *
     * @param string $name The name the entity is stored under
     * @return boolean
     */
    public static function isStored( $name );

    /**
     * Stores the object by the name provided
     *
     * The object can be any PHP object.
     *
     * @param string $name The name we are storing the object as
     * @param mixed $object The entity being stored
     * @return mixed
     */
    public static function store( $name, $object );

    /**
     * Returns the object stored
     *
     * @param string $name
     * @return mixed
     */
    public static function getStored( $name );
}
