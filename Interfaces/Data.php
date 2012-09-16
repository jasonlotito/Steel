<?php

namespace Steel\Interfaces;

/**
 * Data
 *
 * @module Interfaces
 * @submodule View
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
interface Data
{
    /**
     * @param string $rootName
     */
    public function __construct( $rootName );

    /**
     * @param string $name
     * @param string|array $value
     * @return void
     */
    public function setData( $name, $value );
}
