<?php

namespace Steel\Interfaces;

/**
 * View
 */
interface View
{
    /**
     * @param $view
     * @param string $name
     * @return mixed
     */
    public static function create($view, $name = '');

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function attach($name, $value);

    /**
     * @return mixed
     */
    public function render();

    /**
     * @param string $name
     * @return mixed
     */
    public function setRenderer($name);

    /**
     * @return mixed
     */
    public function output();
}
