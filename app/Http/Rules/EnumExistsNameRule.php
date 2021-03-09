<?php

namespace App\Http\Rules;

use App\Enum\Base\Enum;
use Exception;
use Illuminate\Contracts\Validation\Rule;

class EnumExistsNameRule implements Rule
{
    private string $className;

    public function __construct(Enum $enum)
    {
        $this->className = get_class($enum);
    }

    public function passes($attribute, $value): bool
    {
        try {
            /** @var Enum $enum */
            $enum = $this->className;
            $enum::searchByName($value);
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    public function message(): string
    {
        return ':attribute must name enum '.$this->className;
    }
}
