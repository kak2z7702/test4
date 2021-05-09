<?php


use App\Core\Exceptions\Business\BusinessException;
use App\Core\Exceptions\Business\EnumIncorrectTypeException;
use App\Core\Exceptions\Business\EnumValueNotFoundException;

class Enum extends \Spatie\Enum\Laravel\Enum
{

    /**
     * @param  Enum  $enum
     * @return bool
     * @throws EnumIncorrectTypeException
     */
    final public function equal(Enum $enum): bool
    {
        if ((get_class($enum) === static::class) === false) {
            throw new EnumIncorrectTypeException();
        }
        return $this->value === $enum->value;
    }

    /**
     * @param  string|int  $label
     * @return static
     * @throws EnumValueNotFoundException
     */
    final public static function searchByLabel($label): self
    {

        $label = strtolower($label);
        $labels = array_map('strtolower', static::labels());
        if (in_array($label, $labels) === true) {
            $label = array_search($label, $labels);
        }

        try {
            return static::make($label);
        } catch (Exception $exception) {
            throw new EnumValueNotFoundException(
                sprintf(
                    "There's no label %s defined for enum %s, consider adding it in the docblock definition .",
                    $label,
                    static::class
                )
            );
        }
    }

    /**
     * @param  string|int  $value
     * @return static
     * @throws EnumValueNotFoundException
     */
    final public static function searchByValue($value): self
    {
        $value = strtolower($value);
        $values = array_map('strtolower', static::values());

        $allValues = array_merge($values, static::toValues());

        if (in_array($value, $allValues) === false) {
            throw new EnumValueNotFoundException(
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

    /**
     * @param  string|int  $label
     * @return bool
     */
    final public static function existsByLabel($label): bool
    {
        try {
            static::searchByLabel($label);
            return true;
        } catch (EnumValueNotFoundException $exception) {
            return false;
        }
    }

    /**
     * @param  string|int  $value
     * @return bool
     */
    final public static function existsByValue($value): bool
    {
        try {
            static::searchByValue($value);
            return true;
        } catch (EnumValueNotFoundException $exception) {
            return false;
        }
    }
}
