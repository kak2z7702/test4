<?php

namespace App\Http\Requests\User;

use App\DTO\User\UserLoginData;
use App\Http\Requests\ApiRequest;

class UserLoginRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ];
    }

    public function dto(): UserLoginData
    {
        return UserLoginData::fromRequest($this);
    }

}
