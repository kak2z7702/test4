<?php

namespace App\Repositories;

use App\DTO\User\CreateUserData;
use App\Exceptions\Business\EntityNotFoundException;
use App\Models\User;

interface UserRepository
{

    /**
     * @param  int  $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function findById(int $id): User;

    /**
     * @param  string  $email
     * @return User
     * @throws EntityNotFoundException
     */
    public function findByEmail(string $email): User;

    public function create(CreateUserData $dto): User;
}