<?php

namespace App\Http\Requests\User;

use App\DTO\User\CreateUserData;
use App\Http\Requests\ApiRequest;

class UserRegisterRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }


    public function dto(): CreateUserData
    {
        return CreateUserData::fromRequest($this);
    }

}

