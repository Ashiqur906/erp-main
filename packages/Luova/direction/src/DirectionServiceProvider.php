<?php

namespace Luova\Direction;

use Illuminate\Support\ServiceProvider;

class DirectionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'direction');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/direction')
        ]);



        if (file_exists($file =  __DIR__ . '/Helpers/direction_helpers.php')) {
            require $file;
        }

        $this->publishes([
            __DIR__ . '/database/seeds/DirectionSeeder.php' => database_path('seeds/DirectionSeeder.php'),
        ], 'direction-seeds');
        $this->publishes([
            __DIR__ . '/database/sql/districts.sql' => database_path('sqls/districts.sql'),
        ], 'direction-sql');


        // php artisan vendor:publish --tag=direction-config
        //php artisan vendor:publish --tag=direction-migrations
        //php artisan vendor:publish --tag=direction-seeds
        //php artisan vendor:publish --tag=direction-sql
        //php artisan db:seed --class=DirectionSeeder
    }
}
