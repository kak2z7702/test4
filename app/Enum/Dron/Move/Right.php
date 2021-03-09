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

    public function moveX(): int
    {
        return 1;
    }

    public function moveY(): int
    {
        return 0;
    }

}