<?php

namespace Luova\Refarance;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class RefaranceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'refarance');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/refarance')
        ]);

        if (file_exists($file =  __DIR__ . '/Helpers/refarance_helpers.php')) {
            require $file;
        }
    }

    // public function register()
    // {


    //     $this->mergeConfigFrom(__DIR__ . '/Config/menu.php', 'menu.admin');
    // }
}
