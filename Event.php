<?php

namespace Steel;

use Steel\Event\EventInterface;

/**
 * Event Manager
 *
 * @module Event
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
class Event
{
    /**
     * @var array
     */
    protected static $observers = array();

    /**
     * Set handler to call while on an event
     *
     * @param EventInterface $event
     * @param callable $callable
     * @return void
     */
    public static function on(EventInterface $event, callable $callable)
    {
        $eventName = (string) $event;
        self::$observers[$eventName][] = $callable;
    }

    /**
     * Send an event with data optional
     *
     * @param EventInterface $event
     * @param mixed|null $data
     * @return bool
     */
    public static function send(EventInterface $event, $data = null)
    {
        $return = true;
        $eventName = (string) $event;

        if (!isset( self::$observers[$eventName] )) {
            return $return;
        }

        /** @var callable $callable */
        foreach (self::$observers[$eventName] as $callable) {
            $return = $return && call_user_func($callable, $eventName, $data);
        }

        return $return;
    }
}
