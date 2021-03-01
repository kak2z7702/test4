<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Http\ResponseCantBeCreatedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\UserAuthResource;
use App\Http\Responses\ApiResponse;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{

    /**
     * @param  UserRegisterRequest  $request
     * @param  UserRepository  $userRepository
     * @return ApiResponse
     * @throws ResponseCantBeCreatedException
     */
    public function register(
        UserRegisterRequest $request,
        UserRepository $userRepository
    ): ApiResponse {
        return ApiResponse::success(new UserAuthResource($userRepository->create($request->dto())));
    }
}
