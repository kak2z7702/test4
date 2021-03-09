<?php

namespace App\Providers;

use App\DTO\Dron\Position;
use App\Models\Territory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Territory::class, function (){
            return new Territory(
                99,
                99,
                0,
                0
            );
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
