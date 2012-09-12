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
        return apc_fetch($name, $success);
    }

    /**
     * @param string $name
     * @param int $step
     * @return int|bool
     */
    public function increment($name, $step = 1, &$success = null)
    {
        return apc_inc($name, $step, $success);
    }

    /**
     * @param string $name
     * @param int $step
     * @param bool &$success
     * @return int|bool
     */
    public function decrement($name, $step = 1, &$success = null)
    {
        return apc_dec($name, $step, $success);
    }

    /**
     * @param string $name
     * @return bool|string[] Returns TRUE on success or FALSE on failure. For array of keys returns list of failed keys.
     */
    public function delete($name)
    {
        return apc_delete($name);
    }
}
