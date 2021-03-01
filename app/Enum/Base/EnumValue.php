<?php

namespace App\Enum\Base;

interface EnumValue
{
    public function value(): int;
    public function name(): string;
}
