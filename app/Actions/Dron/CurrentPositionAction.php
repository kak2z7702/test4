<?php

namespace App\Actions\Dron;

use App\DTO\Dron\Position;
use App\Models\Territory;
use Illuminate\Contracts\Filesystem\Filesystem;

class CurrentPositionAction
{

    private Filesystem $filesystem;
    private Territory $territory;

    public function __construct(Filesystem $filesystem, Territory $territory)
    {
        $this->filesystem = $filesystem;
        $this->territory = $territory;
    }

    public function execute(): Position
    {
        if ($this->filesystem->exists('dron_moves')) {
            $last = exec(sprintf(
                'tail -n 1 %s',
                $this->filesystem->path('dron_moves')
            ));
            return new Position([
                'xPos' => (int)explode(',', $last)[0],
                'yPos' => (int)explode(',', $last)[1],
            ]);

        }

        return new Position([
            'xPos' => $this->territory->defaultX(),
            'yPos' => $this->territory->defaultY(),
        ]);
    }

}