<?php

namespace App\Repositories\Eloquent;

use App\DTO\User\CreateUserData;
use App\Exceptions\Business\EntityNotFoundException;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;

class EloquentUserRepository implements UserRepository
{

    private BcryptHasher $bcryptHasher;

    public function __construct(BcryptHasher $bcryptHasher)
    {
        $this->bcryptHasher = $bcryptHasher;
    }


    /**
     * @param  string  $email
     * @return User
     * @throws EntityNotFoundException
     */
    public function findByEmail(string $email): User
    {
        $user = User::where('email', $email)->first();
        if($user === null){
            throw new EntityNotFoundException('User not found');
        }
        return $user;
    }

    /**
     * @param  int  $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function findById(int $id): User
    {
        $user = User::find($id);
        if($user === null){
            throw new EntityNotFoundException('User not found');
        }
        return $user;
    }

    /**
     * @param  CreateUserData  $dto
     * @return User
     */
    public function create(CreateUserData $dto): User
    {
        $user = new User();
        $user->name = $dto->name;
        $user->email = $dto->email;
        $user->password = $this->bcryptHasher->make($dto->password);
        $user->api_token = Str::random(80);
        $user->save();
        return $user;
    }


}