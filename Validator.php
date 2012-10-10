<?php

namespace Steel;

/**
 * Validator
 *
 * @module Validator
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
abstract class Validator
{
    abstract function validate( $value, array $valueSet = array() );
}
