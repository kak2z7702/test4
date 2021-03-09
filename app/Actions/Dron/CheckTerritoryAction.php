<?php

namespace App\Actions\Dron;

use App\DTO\Dron\Position;
use App\Exceptions\Business\Dron\PositionOutsideException;
use App\Models\Territory;

class CheckTerritoryAction
{

    private Territory $territory;

    public function __construct(Territory $territory)
    {
        $this->territory = $territory;
    }

    /**
     * @param  Position  $position
     * @return Position
     * @throws PositionOutsideException
     */
    public function execute(Position $position): Position
    {
        if (
            $position->xPos > $this->territory->getXMax() ||
            $position->xPos < $this->territory->getXMin() ||
            $position->yPos > $this->territory->getYMax() ||
            $position->yPos < $this->territory->getYMin()
        ) {
            throw new PositionOutsideException();
        }

        return $position;
    }


}