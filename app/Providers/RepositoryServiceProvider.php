<?php
declare(strict_types=1);

namespace App\Providers;

use App\Http\Repositories\iUserRepository;
use App\Http\Repositories\Rdbean\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(iUserRepository::class, function (){
            return new UserRepository();
        });
    }

}
