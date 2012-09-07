<?php

namespace Steel\Interfaces;

interface Route
{
    /**
     * @param string $entity
     * @param string $action
     */
    public function __construct($entity, $action);
    public function follow();
}
