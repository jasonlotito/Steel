<?php

namespace Steel;

use Steel\Interfaces\Renderer as IRenderer;

class Renderer
{
    /**
     * Return a renderer based on type
     *
     * @return IRenderer
     */
    public static function fromEngineType($renderingEngineType)
    {
        $renderClassName = 'Steel\\Renderers\\' . (string) $renderingEngineType;
        if (class_exists($renderClassName)) {
            return new $renderClassName();
        }
    }
}
