<?php

namespace App\Actions\Dron;

use App\DTO\Dron\Position;
use Illuminate\Contracts\Filesystem\Filesystem;

class LogMoveAction
{

    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function execute(Position $position): void
    {
        $this->filesystem->append('dron_moves', sprintf(
            '%d,%d',
            $position->xPos,
            $position->yPos
        ));
    }

}