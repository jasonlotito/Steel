<?php

namespace Steel\Interfaces;

interface Config
{
    public function __construct($uri);

    public function get();
}
