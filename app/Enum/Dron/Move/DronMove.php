<?php

namespace App\Enum\Dron\Move;

use App\Enum\Base\EnumValue;

interface DronMove extends EnumValue
{
    public function move(): int;
}