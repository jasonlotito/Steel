<?php

namespace Steel\Injectors;

use \Steel\Event as SteelEvent;

/**
 * Event
 *
 * ${DESCRIPTION}
 *
 * @module Steel
 * @submodule Injectors
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
trait Event
{
    protected function onEvent( $event, callable $callable )
    {
        SteelEvent::on($event, $callable);
    }

    protected function sendEvent( $event, $data = null )
    {
        SteelEvent::send($event, $data);
    }
}
