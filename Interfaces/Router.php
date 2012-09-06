<?php

namespace Steel\Interfaces;

interface Router
{
    public function __construct($routes);

    public function getRoute(Request $request);
}
