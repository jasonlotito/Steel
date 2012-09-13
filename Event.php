<?php

namespace Steel;

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
     * @param string $event
     * @param callable $callable
     * @return void
     */
    public static function on($event, callable $callable)
    {
        self::$observers[$event][] = $callable;
    }

    /**
     * Send an event with data optional
     *
     * @param string $event
     * @param mixed|null $data
     * @return bool
     */
    public static function send($event, $data = null)
    {
        $return = true;

        if (!isset(self::$observers[$event])) {
            return $return;
        }

        /** @var callable $callable */
        foreach (self::$observers[$event] as $callable) {
            $return = $return && call_user_func($callable, $event, $data);
        }

        return $return;
    }
}
