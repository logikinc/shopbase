<?php

namespace Anurag;

use Illuminate\Support\ServiceProvider;

class ShopbaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load Routes From
        $this->loadRoutesFrom(__DIR__.'/ShopbaseRoutes.php');
        // Load Migration From
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        // Load Views From
        $this->loadViewsFrom(__DIR__.'/views','shopbase');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
             __DIR__.'/ShopbaseConfig.php' => config_path('shopbase.php'),
        ],'shopbase');
    }
}
