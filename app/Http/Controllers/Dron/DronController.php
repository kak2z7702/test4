<?php

namespace App\Http\Controllers\Dron;

use App\Actions\Dron\LogMoveAction;
use App\Actions\Dron\LogMovesAction;
use App\Actions\Dron\MovesAction;
use App\Exceptions\Business\BusinessException;
use App\Exceptions\Business\EnumValueNotFoundException;
use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dron\MoveRequest;
use App\Http\Requests\Dron\SetPositionRequest;
use App\Http\Resources\Dron\PositionResource;
use App\Http\Responses\ApiResponse;

class DronController extends Controller
{

    /**
     * @param  SetPositionRequest  $request
     * @param  LogMoveAction  $logMoveAction
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public function setStart(
        SetPositionRequest $request,
        LogMoveAction $logMoveAction
    ): ApiResponse
    {
        $logMoveAction->execute($request->position());
        return ApiResponse::success(new PositionResource($request->position()));
    }

    public function setPosition(): ApiResponse
    {

    }

    /**
     * @param  MoveRequest  $request
     * @param  MovesAction  $action
     * @return ApiResponse
     * @throws EnumValueNotFoundException
     * @throws ResponseCantBeCreatedException
     * @throws BusinessException
     */
    public function move(
        MoveRequest $request,
        MovesAction $action
    ): ApiResponse {
        return ApiResponse::success(new PositionResource($action->execute($request->bag())));
    }

}