<?php
declare(strict_types=1);

namespace App\Http\Repositories\Mock;

use App\Http\Repositories\iUserRepository;
use App\Models\User;

class UserRepository implements iUserRepository
{

    public function findById(int $id): User
    {
        return new User([
            'id' => $id,
        ]);
    }
}
