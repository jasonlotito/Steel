<?php

namespace Steel;

use Steel\Interfaces\Cache as ICache;
use Steel\Interfaces\CacheAdapter;

/**
 * Cache
 *
 */
class Cache implements ICache, CacheAdapter
{
    /**
     * @var CacheAdapter
     */
    protected $adapter;

    /**
     * @param CacheAdapter $adapter
     */
    public function __construct(CacheAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param array|string $name
     * @return mixed|void
     */
    public function delete($name)
    {
        $this->adapter->delete($name);
    }

    /**
     * @param string $name
     * @param string $value
     * @param null $ttl
     * @return bool|void
     */
    public function set($name, $value, $ttl = 60)
    {
        $this->adapter->set($name, $value, $ttl);
    }

    /**
     * @param string $name
     * @param null $success
     * @return mixed|void
     */
    public function get($name, &$success = null)
    {
        return $this->adapter->get($name);
    }

    /**
     * @param string $name
     * @param int $step
     * @return int|void
     */
    public function increment($name, $step = 1, &$success = null)
    {
        $this->adapter->increment($name, $step);
    }

    /**
     * @param string $name
     * @param int $step
     * @param bool $success
     * @return mixed
     */
    public function decrement($name, $step = 1, &$success = null)
    {
        $this->adapter->decrement($name, $step, $success);
    }
}
