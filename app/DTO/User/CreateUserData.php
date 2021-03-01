<?php

namespace App\DTO\User;

use App\Http\Requests\User\UserRegisterRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateUserData extends DataTransferObject
{
    public string $email;
    public string $name;
    public string $password;

    public static function fromRequest(UserRegisterRequest $request): self
    {
        return new self([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'password' => $request->post('password'),
        ]);
    }
}
