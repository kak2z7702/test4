<?php

namespace App\DTO\User;

use App\Http\Requests\User\UserLoginRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UserLoginData extends DataTransferObject
{

    public string $email;
    public string $password;

    public static function fromRequest(UserLoginRequest $request): self
    {
        return new self([
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ]);
    }

}
