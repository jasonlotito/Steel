<?php

namespace Steel\Interfaces;

interface Renderer
{
    public function getDataType();

    public function getTemplateType();

    public function render( $data, $template );
}
