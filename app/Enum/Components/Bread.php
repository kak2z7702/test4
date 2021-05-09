<?php
declare(strict_types=1);

namespace App\Enum\Components;

use App\Enum\Base\EnumValue;

class Bread implements EnumValue, Component
{

    public function value(): int
    {
        return 1;
    }

    public function name(): string
    {
        return 'bread';
    }

    public function label(): string
    {
        return 'fresh bread';
    }
}
