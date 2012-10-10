<?php

namespace Steel\Controller\Events;

use Steel\Event\AbstractEvent;

/**
 * Flushed
 *
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
class Flushed extends AbstractEvent
{
    protected $event = __CLASS__;
}
