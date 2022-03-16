<?php

namespace Luova\Payment;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'payment');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/payment')
        ]);

        if (file_exists($file =  __DIR__ . '/Helpers/payment_helpers.php')) {
            require $file;
        }
    }

    // public function register()
    // {


    //     $this->mergeConfigFrom(__DIR__ . '/Config/menu.php', 'menu.admin');
    // }
}
