<?php

namespace Ansien\SymfonyAgGridBundle\Util;

use Ansien\SymfonyAgGridBundle\Data\Grid\GridInterface;

final class GridMapper
{
    public static function getMappedField(GridInterface $grid, string $mapKey): string
    {
        $mappedFields = $grid->mapFields();

        if (array_key_exists($mapKey, $mappedFields) === false) {
            throw new \BadMethodCallException("$mapKey does not exist in mapped fields of supplied grid.");
        }

        return $mappedFields[$mapKey];
    }

    public static function hasMappedField(GridInterface $grid, string $mapKey): bool
    {
        $mappedFields = $grid->mapFields();

        return array_key_exists($mapKey, $mappedFields);
    }
}
