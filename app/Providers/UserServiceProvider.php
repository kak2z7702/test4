<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepository::class, function () {
            return new EloquentUserRepository(
                $this->app->make(BcryptHasher::class)
            );
        });
    }
}
