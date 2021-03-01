<?php

namespace App\Actions\User;

use App\DTO\User\UserLoginData;
use App\Exceptions\Business\EntityNotFoundException;
use App\Exceptions\Business\InvalidLoginOrPassword;
use App\Exceptions\Business\ObjectNotExistsException;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Hash;
use Illuminate\Hashing\BcryptHasher;
use function Symfony\Component\Translation\t;

class UserLoginAction
{

    private UserRepository $userRepository;
    /**
     * @var BcryptHasher
     */
    private BcryptHasher $bcryptHasher;

    public function __construct(
        UserRepository $userRepository,
        BcryptHasher $bcryptHasher
    )
    {
        $this->userRepository = $userRepository;
        $this->bcryptHasher = $bcryptHasher;
    }


    /**
     * @param  UserLoginData  $data
     * @return User
     * @throws InvalidLoginOrPassword
     */
    public function execute(UserLoginData $data): User
    {
        try {
            $user = $this->userRepository->findByEmail($data->email);
        } catch (Exception $exception) {
            throw new InvalidLoginOrPassword();
        }

        if ($this->bcryptHasher->check($data->password, $user->password) === false) {
            throw new InvalidLoginOrPassword();
        }

        return $user;
    }
}
