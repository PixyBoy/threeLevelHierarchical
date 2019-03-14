<?php

namespace Pixyboy\Tlh;

use Illuminate\Support\ServiceProvider;

class TlhServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'MyConfig'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views', 'MyView');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
