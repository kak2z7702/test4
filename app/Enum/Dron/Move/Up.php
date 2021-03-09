<?php

namespace App\Enum\Dron\Move;

class Up implements DronMove
{

    public function value(): int
    {
        return 3;
    }

    public function name(): string
    {
        return 'up';
    }

    public function moveX(): int
    {
        return 0;
    }

    public function moveY(): int
    {
        return 1;
    }

}