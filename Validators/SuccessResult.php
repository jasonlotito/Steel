<?php

namespace Steel\Validators;

/**
 * SuccessResult
 *
 * @module Validators
 * @submodule Result
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
class SuccessResult
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Constructor
     *
     * @param string $message
     */
    public function __construct( $message )
    {
        $this->message = $message;
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }
}
