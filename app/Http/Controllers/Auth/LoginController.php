<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\UserLoginAction;
use App\Exceptions\Business\InvalidLoginOrPassword;
use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserAuthResource;
use App\Http\Responses\ApiResponse;

class LoginController extends Controller
{

    /**
     * @param  UserLoginRequest  $request
     * @param  UserLoginAction  $action
     * @return ApiResponse
     * @throws InvalidLoginOrPassword
     * @throws ResponseCantBeCreatedException
     */
    public function login(
        UserLoginRequest $request,
        UserLoginAction $action
    ): ApiResponse {
        return ApiResponse::success(new UserAuthResource($action->execute($request->dto())));
    }
}
