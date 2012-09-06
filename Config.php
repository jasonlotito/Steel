<?php

namespace Steel;

class Config implements Interfaces\Config
{
    protected $file;

    protected $config;

    public function __construct( $file )
    {
        $this->file = $file;
        $this->parse();
    }

    protected function parse()
    {
        $this->config = json_decode( file_get_contents( $this->file ) );
    }

    public function get()
    {
        return $this->config;
    }
}
