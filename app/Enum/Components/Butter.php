<?php
declare(strict_types=1);

namespace App\Enum\Components;

use App\Enum\Base\EnumValue;

class Butter implements EnumValue, Component
{

    public function value(): int
    {
        return 0;
    }

    public function name(): string
    {
        return 'butter';
    }

    public function label(): string
    {
        return 'good butter';
    }
}
