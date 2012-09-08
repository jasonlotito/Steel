<?php

namespace Steel\Interfaces;

use Steel\Interfaces\CacheAdapter;

interface Cache
{
    /**
     * @param Cache $adapter
     */
    function __construct(CacheAdapter $adapter);
}
