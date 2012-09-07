<?php

namespace Steel\Injectors;

use Steel\Container;
use Steel\Request as SteelRequest;
use Steel\Interfaces\Request as IRequest;

trait Request
{
    /**
     * @return IRequest
     */
    protected function getRequest()
    {
        if (Container::isStored('Request')) {
            return Container::getStored('Request');
        }

        return Container::store('Request', new SteelRequest());
    }
}
