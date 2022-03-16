<?php

namespace Luova\Option;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class OptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'option');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->publishes([
        //     __DIR__ . '/views' => resource_path('views/vendor/option')
        // ]);
        $this->publishes([
            __DIR__ . '/config/lv_option.php' => config_path('lv_option.php')
        ]);


        if (file_exists($file =  __DIR__ . '/Helpers/option_helpers.php')) {
            require $file;
        }
    }

    public function register()
    {


        $this->mergeConfigFrom(__DIR__ . '/config/lv_option.php', 'lv_option');
    }
}
