<?php

namespace Steel\Injectors;

use Steel\Container;
use Steel\Renderer as SteelRenderer;

trait Renderer
{
    protected function getRenderer($renderingEngineType)
    {
        $rendererName = 'Renderer' . $renderingEngineType;
        if (Container::isStored($rendererName)) {
            return Container::getStored($rendererName);
        }

        return Container::store($rendererName, SteelRenderer::fromEngineType($renderingEngineType));
    }
}
