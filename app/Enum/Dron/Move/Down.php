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

    public function move(): int
    {
        return -1;
    }
}