<?php

namespace Steel\Helpers;

/**
 * String
 * ${DESCRIPTION}
 *
 * @module ${MODULE}
 * @submodule ${SUBMODULE}
 * @author Jason Lotito <jasonlotito@gmail.com>
 */
class String
{
    protected $rules = array(
        'ss' => false,
        'os' => 'o',
        'xes' => 'x',
        'oes' => 'o',
        'ies' => 'y',
        'ves' => 'f',
        's' => ''
    );

    protected function inflect($word)
    {
        foreach (array_keys($this->rules) as $key) {
            if (substr($word, ( strlen($key) * -1 )) != $key) {
                continue;
            }

            if ($key === false) {
                return $word;
            }

            return substr($word, 0, strlen($word) - strlen($key)) . $this->rules[$key];
        }

        return $word;
    }

    public function getInflection($word)
    {
        static $wordCache = [ ];

        if (isset( $wordCache[$word] )) {
            return $wordCache[$word];
        }

        $inflectedWord = $this->inflect($word);
        $wordCache[$word] = $inflectedWord;

        return $inflectedWord;
    }
}
