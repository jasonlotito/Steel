<?php

namespace Steel\Interfaces;

interface CacheAdapter
{
    /**
     * @param string $name
     * @param string $value
     * @param int|null $ttl
     * @return boolean
     */
    public function set($name, $value, $ttl = 0);

    /**
     * @param string $name
     * @param bool &$success
     * @return mixed
     */
    public function get($name, &$success = null);

    /**
     * @param string $name
     * @param int $step
     * @return int
     */
    public function increment($name, $step = 1, &$success = null);

    /**
     * @param string $name
     * @param int $step
     * @param bool $success
     * @return mixed
     */
    public function decrement($name, $step = 1, &$success = null);

    /**
     * @param string|array $name
     * @return mixed
     */
    public function delete($name);
}
