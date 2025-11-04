<?php

namespace StatusActivityLog;

use Illuminate\Support\ServiceProvider;

class StatusActivityServiceProvider extends ServiceProvider
{
    public function register()
    {
        // merge config if any
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'status-activity-log');
    }
}