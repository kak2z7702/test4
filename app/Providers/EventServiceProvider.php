<?php

namespace App\Providers;

use App\Events\UserGiftMoneyStatusConvertEvent;
use App\Events\UserGiftMoneyStatusPayoutEvent;
use App\Listeners\UserGiftMoneyStatusConvertingListener;
use App\Listeners\UserGiftMoneyStatusPayoutListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserGiftMoneyStatusConvertEvent::class => [
            UserGiftMoneyStatusConvertingListener::class
        ],
        UserGiftMoneyStatusPayoutEvent::class => [
            UserGiftMoneyStatusPayoutListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
