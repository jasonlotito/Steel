<?php

namespace Steel\Request\Header\Accepts;

/**
 * AbstractAccept
 *
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
abstract class AbstractAccept implements InterfaceAccepts
{
    /**
     * @var string
     */
    protected $header = 'text/text';

    public function accepts( $header )
    {
        return false !== stripos($header, $this->header);
    }

    public function __toString()
    {
        return $this->header;
    }
}
