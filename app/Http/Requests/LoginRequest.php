<?php

namespace App\Http\Requests;

use App\DTO\UserLoginData;
use App\VO\User\Email;
use App\VO\User\Password;

class LoginRequest extends ApiRequest
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
        return new UserLoginData(
            $this->email(),
            $this->password()
        );
    }

    private function email(): Email
    {
        return new Email($this->post('email'));
    }

    private function password(): Password
    {
        return new Password($this->post('password'));
    }
}
