<?php

namespace App\Actions\Dron;

use App\Bags\Dron\PositionBag;

class LogMovesAction
{

    private LogMoveAction $logMoveAction;

    public function __construct(LogMoveAction $logMoveAction)
    {
        $this->logMoveAction = $logMoveAction;
    }

    public function execute(PositionBag $positions): void
    {
        foreach ($positions as $position){
            $this->logMoveAction->execute($position);
        }
    }

}