<?php

namespace App\Enum\Base;

interface Enum
{
    public static function all(): array;

    public static function asFormattedMap(): array;

    public static function default(): EnumValue;

    public static function searchByName(string $name): EnumValue;

    public static function searchByValue(int $value): EnumValue;
}
