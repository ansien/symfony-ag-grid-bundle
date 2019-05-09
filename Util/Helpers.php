<?php

namespace Ansien\SymfonyAgGridBundle\Util;

class Helpers
{
    public static function snakeToCamelCase(string $string, bool $capitalizeFirstCharacter = false): string
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
}
