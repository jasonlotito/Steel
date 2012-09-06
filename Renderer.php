<?php

namespace Steel;

class Renderer
{
    /**
     * Return a renderer based on type
     *
     * @return Steel\Interfaces\Renderer
     */
    public static function fromEngineType( $renderingEngineType )
    {
        $renderClassName = 'Steel\\Renderers\\' . $renderingEngineType;
        if (class_exists( $renderClassName )) {
            return new $renderClassName();
        }
    }
}
