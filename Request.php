<?php

namespace Steel;

class Request implements Interfaces\Request
{
    use
    Injectors\Config;

    public function __construct()
    {
    }

    public function getAction()
    {
        return $_SERVER[ 'REQUEST_METHOD' ];
    }

    public function getEntity()
    {
        return isset( $_SERVER[ 'REDIRECT_URL' ] ) ? $_SERVER[ 'REDIRECT_URL' ] : '/';
    }

    public function isConfig()
    {
        return isset( $_SERVER[ 'REDIRECT_QUERY_STRING' ] )
            && $_SERVER[ 'REDIRECT_QUERY_STRING' ] === $this->getConfig()->get()->config;
    }

    public function accepts( $type )
    {
        return false !== stripos( $_SERVER[ 'HTTP_ACCEPT' ], $type );
    }
}
