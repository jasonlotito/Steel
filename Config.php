<?php

namespace Steel;

class Config implements Interfaces\Config
{
    protected $file;

    protected $config;

    public function __construct($file)
    {
        $this->file = $file;
        $this->parse();
    }

    protected function parse()
    {
        $this->config = (simplexml_load_file($this->file));
    }

    public function get()
    {
        return $this->config;
    }

    function __get($name)
    {
        return $this->config->{$name};
    }
}
