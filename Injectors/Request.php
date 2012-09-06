<?php

namespace Steel\Injectors;

use Steel\Container;
use Steel\Request as SteelRequest;

trait Request
{
    protected function getRequest()
    {
        if (Container::isStored('Request')) {
            return Container::getStored('Request');
        }

        return Container::store('Request', new SteelRequest());
    }
}
