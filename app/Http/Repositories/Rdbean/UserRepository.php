<?php
declare(strict_types=1);

namespace App\Http\Repositories\Rdbean;

use App\Exceptions\Business\EntityNotFoundException;
use App\Http\Repositories\iUserRepository;
use App\Models\User;

class UserRepository implements iUserRepository
{

    public function findById(int $id): User
    {
        if($user === null){
            throw new EntityNotFoundException('User model not found');
        }

    }
}
