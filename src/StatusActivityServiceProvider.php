<?php

namespace Parth\StatarLog;

use Illuminate\Support\ServiceProvider;

class StatarLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__.'/../config/statarlog.php' => config_path('statarlog.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/statarlog.php', 'statarlog');
        $this->app->singleton('statarlog', function () {
            return new StatarLogManager();
        });
    }
}
