<?php

namespace App\Actions\User;

use App\DTO\UserCreateData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserCreateAction
{

    /**
     * @param  UserCreateData  $data
     * @return User
     */
    public function execute(UserCreateData $data): User
    {
        $user = new User();
        $user->name = $data->getName();
        $user->email = $data->getEmail();
        $user->password = Hash::make($data->getPassword());
        $user->api_token = Str::random(80);
        $user->save();
        return $user;
    }
}
