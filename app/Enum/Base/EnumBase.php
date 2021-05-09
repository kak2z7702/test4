<?php

namespace App\Enum\Base;

use App\Exceptions\Business\EnumValueNotFoundException;

abstract class EnumBase implements Enum
{
    abstract public static function all(): array;

    abstract public static function default(): EnumValue;

    public static function values(): array
    {
        $result = [];
        foreach (static::all() as $value){
            $result[] = $value->value();
        }
        return $result;
    }

    public static function asFormattedMap(): array
    {
        $result = [];
        foreach (static::all() as $value){
            $result[$value->value()] = $value->name();
        }
        return $result;

    }

    /**
     * @param  string  $name
     * @return EnumValue
     * @throws EnumValueNotFoundException
     */
    public static function searchByName(string $name): EnumValue
    {
        foreach (static::all() as $enumValue){
            if(strtolower($name) === strtolower($enumValue->name())){
                return $enumValue;
            }
        }
        throw new EnumValueNotFoundException;
    }

    /**
     * @param  int  $value
     * @return EnumValue
     * @throws EnumValueNotFoundException
     */
    public static function searchByValue(int $value): EnumValue
    {
        foreach (static::all() as $enumValue){
            if($value === $enumValue->value()){
                return $enumValue;
            }
        }
        throw new EnumValueNotFoundException;
    }
}
