<?php

namespace App\Enum\Dron\Move;

class Left implements DronMove
{

    public function value(): int
    {
        return 1;
    }

    public function name(): string
    {
        return 'left';
    }

    public function moveX(): int
    {
        return -1;
    }

    public function moveY(): int
    {
        return 0;
    }

}