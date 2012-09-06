<?php

namespace Steel\Injectors\View;

use \Steel\Container;
use \Steel\View\Template as SteelTemplate;

trait Template
{
    public function getTemplate($viewName)
    {
        $templateName = $viewName . 'Template';

        if (Container::isStored($templateName)) {
            return Container::getStored($templateName);
        }

        return Container::store($templateName, SteelTemplate::create($templateName));
    }
}
