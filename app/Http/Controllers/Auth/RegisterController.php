<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\UserCreateAction;
use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserAuthResource;
use App\Http\Responses\ApiResponse;

class RegisterController extends Controller
{

    /**
     * @param  UserRegisterRequest  $request
     * @param  UserCreateAction  $action
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public function register(
        UserRegisterRequest $request,
        UserCreateAction $action
    ): ApiResponse {
        return ApiResponse::success(new UserAuthResource($action->execute($request->dto())));
    }
}
