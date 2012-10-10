<?php

namespace Steel\Event;

/**
 * AbstractEvent
 *
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
abstract class AbstractEvent implements EventInterface
{
    protected $event;

    public function __toString()
    {
        return $this->event;
    }
}
