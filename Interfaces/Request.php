<?php

namespace Steel\Interfaces;

interface Request
{
    public function getAction();

    public function getEntity();
}
