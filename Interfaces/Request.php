<?php

namespace Steel\Interfaces;

/**
 * Request Interface
 */
interface Request
{
    public function getAction();
    public function getEntity();
    public function accepts();
}
