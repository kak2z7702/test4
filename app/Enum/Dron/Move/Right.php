<?php

namespace App\Enum\Dron\Move;

class Right implements DronMove
{

    public function value(): int
    {
        return 2;
    }

    public function name(): string
    {
        return 'right';
    }

    public function move(): int
    {
        return 1;
    }

}