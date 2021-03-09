<?php

namespace App\Enum\Dron\Move;

class Down implements DronMove
{

    public function value(): int
    {
        return 0;
    }

    public function name(): string
    {
        return 'down';
    }

    public function moveX(): int
    {
        return 0;
    }

    public function moveY(): int
    {
        return -1;
    }
}