<?php

namespace Steel\Cache;

use Steel\Interfaces\CacheAdapter;

class APC implements CacheAdapter
{
    /**
     * @param string $name
     * @param string $value
     * @param int|null $ttl
     * @return boolean
     */
    public function set($name, $value, $ttl = 0)
    {
        return apc_add($name, $value, $ttl);
    }

    /**
     * @param string $name
     * @param boolean &$success
     * @return mixed
     */
    public function get($name, &$success = null)
    {
        apc_fetch($name, $success);
    }

    /**
     * @param string $name
     * @param int $step
     * @return int
     */
    public function increment($name, $step = 1, &$success = null)
    {
        apc_inc($name, $step, $success);
    }

    /**
     * @param string $name
     * @param int $step
     * @param bool &$success
     * @return mixed
     */
    public function decrement($name, $step = 1, &$success = null)
    {
        apc_dec($name, $step, $success);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function delete($name)
    {
        apc_delete($name);
    }
}
