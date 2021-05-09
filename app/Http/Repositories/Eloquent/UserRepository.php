<?php
declare(strict_types=1);

namespace App\Http\Repositories\Eloquent;

use App\Exceptions\Business\EntityNotFoundException;
use App\Http\Repositories\iUserRepository;
use App\Models\User;

class UserRepository implements iUserRepository
{

    /**
     * @param  int  $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function findById(int $id): User
    {
        $user = User::find($id);
        if($user === null){
            throw new EntityNotFoundException('User model not found');
        }
        return $user;

    }
}
