<?php

namespace App\Actions\User;

use App\DTO\UserLoginData;
use App\Exceptions\Business\InvalidLoginOrPassword;
use App\Exceptions\Business\ObjectNotExistsException;
use App\Models\User;
use Hash;

class UserLoginAction
{

    /**
     * @param  UserLoginData  $data
     * @return User
     * @throws InvalidLoginOrPassword
     */
    public function execute(UserLoginData $data): User
    {
        try {
            $user = User::where('email', $data->getEmail())->firstOrFail();
        } catch (ObjectNotExistsException $exception) {
            throw new InvalidLoginOrPassword();
        }

        if (Hash::check($data->getPassword(), $user->password) === false) {
            throw new InvalidLoginOrPassword();
        }

        return $user;
    }
}
