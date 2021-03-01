<?php

namespace App\Http\Controllers\Play;

use App\Actions\Play\CreatePlayAction;
use App\Exceptions\Business\EntityNotFoundException;
use App\Exceptions\Business\Play\PlayTimeOverlapsException;
use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Play\CreateRequest;
use App\Http\Requests\Play\DeleteRequest;
use App\Http\Resources\MessageResource;
use App\Http\Resources\Play\PlayResource;
use App\Http\Responses\ApiResponse;
use App\Repositories\PlayRepository;

class PlayController extends Controller
{

    /**
     * @param  PlayRepository  $playRepository
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public function list(
        PlayRepository $playRepository
    ): ApiResponse {
        return ApiResponse::success(PlayResource::collection($playRepository->all()));
    }

    /**
     * @param  CreateRequest  $request
     * @param  CreatePlayAction  $action
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     * @throws PlayTimeOverlapsException
     */
    public function create(
        CreateRequest $request,
        CreatePlayAction $action
    ): ApiResponse {
        return ApiResponse::success(new PlayResource($action->execute($request->dto())));
    }

    /**
     * @param  DeleteRequest  $request
     * @param  PlayRepository  $playRepository
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     * @throws EntityNotFoundException
     */
    public function delete(
        DeleteRequest $request,
        PlayRepository $playRepository
    ): ApiResponse {
        $playRepository->delete($request->id());
        return ApiResponse::success(new MessageResource('success'));
    }

}