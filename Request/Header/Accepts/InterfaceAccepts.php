<?php

namespace Steel\Request\Header\Accepts;

/**
 * InterfaceAccepts
 *
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
interface InterfaceAccepts
{
    function __toString();
    public function accepts( $header );
}
