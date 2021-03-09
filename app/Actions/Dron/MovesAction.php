<?php

namespace App\Actions\Dron;

use App\Bags\Dron\MoveBag;
use App\Bags\Dron\PositionBag;
use App\DTO\Dron\Position;
use App\Exceptions\Business\BusinessException;
use App\Exceptions\Business\Dron\PositionOutsideException;
use Exception;

class MovesAction
{

    private MoveAction $moveAction;
    private CurrentPositionAction $currentPositionAction;
    private LogMovesAction $logMovesAction;

    public function __construct(
        MoveAction $moveAction,
        CurrentPositionAction $currentPositionAction,
        LogMovesAction $logMovesAction

    ) {
        $this->moveAction = $moveAction;
        $this->currentPositionAction = $currentPositionAction;
        $this->logMovesAction = $logMovesAction;
    }

    /**
     * @param  MoveBag  $moves
     * @return Position
     * @throws BusinessException
     */
    public function execute(MoveBag $moves): Position
    {
        $position = $this->currentPositionAction->execute();
        $positionsBag = new PositionBag();

        foreach ($moves as $move) {
            $position = $this->moveAction->execute($move, $position);
            $positionsBag->add($position);
        }

        $this->logMovesAction->execute($positionsBag);

        return $position;
    }
}