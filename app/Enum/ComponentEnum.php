<?php


namespace App\Enum;


use Spatie\Enum\Laravel\Enum;

/**
 * Class ComponentEnum
 * @package App\Enum
 * @method static self bread()
 * @method static self butter()
 */
class ComponentEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'bread' => 1,
            'butter' => 2,
        ];

    }


    final public static function searchByValue($value): self
    {
        $value = strtolower($value);
        $values = array_map('strtolower', static::values());

        $allValues = array_merge($values, static::toValues());

        if (in_array($value, $allValues) === false) {
            throw new \Exception(
                sprintf(
                    "There's no value %s defined for enum %s, consider adding it in the docblock definition.",
                    $value,
                    static::class
                )
            );
        }

        $key = array_search($value, $allValues);
        return static::make($key);
    }
}
