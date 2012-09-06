<?php

namespace Steel\View;

class Data
{
    public static function build($type, $name)
    {
        $className = "\\Steel\\View\\Data\\$type";

        if (class_exists($className)) {
            return new $className( $name );
        }

        throw new InvalidArgumentExcpetion( "$type doesn't exist in Steel\\View\\Data" );
    }
}
