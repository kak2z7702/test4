<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentPlayRepository;
use App\Repositories\PlayRepository;
use Illuminate\Support\ServiceProvider;

class PlayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlayRepository::class, function () {
            return new EloquentPlayRepository();
        });
    }
}
