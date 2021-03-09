<?php

namespace App\Actions\Dron;

use App\DTO\Dron\Position;
use App\Enum\Dron\Move\DronMove;
use App\Exceptions\Business\BusinessException;

class MoveAction
{

    private CheckTerritoryAction $checkTerritoryAction;
    private LogMoveAction $logAction;

    public function __construct(
        CheckTerritoryAction $checkTerritoryAction,
        LogMoveAction $logAction
    )
    {
        $this->checkTerritoryAction = $checkTerritoryAction;
        $this->logAction = $logAction;
    }

    /**
     * @param  DronMove  $move
     * @param  Position  $position
     * @return Position
     * @throws BusinessException
     */
    public function execute(DronMove $move, Position $position): Position
    {


        return $this->checkTerritoryAction->execute(new Position([
            'xPos' => $position->xPos + $move->moveX(),
            'yPos' => $position->yPos + $move->moveY(),
        ]));
    }
}