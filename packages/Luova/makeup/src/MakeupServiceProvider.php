<?php

namespace Luova\Makeup;


use Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MakeupServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $licence = true;

        if ($licence || Request::is('admin/licence')) {
        } else {
            redirect('admin/licence')->send();
        }


        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'makeup');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/makeup')
        ]);

        $this->publishes([
            __DIR__ . '/config/lv_makeup.php' => config_path('lv_makeup.php')
        ]);

        if (file_exists($file =  __DIR__ . '/Helpers/makeup_helpers.php')) {
            require $file;
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/lv_makeup.php', 'lv_makeup');
    }
}
