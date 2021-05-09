<?php
declare(strict_types=1);

namespace App\Http\Repositories;

use App\Exceptions\Business\EntityNotFoundException;
use App\Models\User;

interface iUserRepository
{

    /**
     * @param  int  $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function findById(int $id): User;

}
