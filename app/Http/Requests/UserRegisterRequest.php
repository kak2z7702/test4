<?php

namespace App\Http\Requests;

use App\DTO\UserCreateData;
use App\VO\User\Email;
use App\VO\User\Name;
use App\VO\User\Password;

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


    public function dto(): UserCreateData
    {
        return new UserCreateData(
            $this->email(),
            $this->name(),
            $this->password()
        );
    }

    private function name(): Name
    {
        return new Name($this->post('name'));
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
