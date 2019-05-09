<?php

namespace Skrepr\SymfonyAgGridBundle\Util;

class Helpers
{
    /**
     * @param $string
     * @param bool $capitalizeFirstCharacter
     */
    public static function snakeToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
}
