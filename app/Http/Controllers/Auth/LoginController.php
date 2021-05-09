<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\UserLoginAction;
use App\Enum\Base\EnumValue;
use App\Enum\ComponentEnum;
use App\Enum\Components;
use App\Exceptions\Business\EntityNotFoundException;
use App\Exceptions\Business\InvalidLoginOrPassword;
use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\UserRepository;
use App\Http\Repositories\iUserRepository;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserAuthResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginController extends Controller
{

    /**
     * @param  UserLoginRequest  $request
     * @param  UserLoginAction  $action
     * @param  iUserRepository  $repository
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

