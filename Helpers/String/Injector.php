<?php

namespace Steel\Helpers\String;

use \Steel\Container;
use \Steel\Helpers\String;

/**
 * Injector
 *
 * @module Helpers
 * @submodule String
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
trait Injector
{
    /**
     * @return \Steel\Helpers\String
     */
    protected function getStringHelper()
    {
        if (Container::isStored(__TRAIT__)) {
            return Container::getStored(__TRAIT__);
        }

        return Container::store(__TRAIT__, new String());
    }
}
