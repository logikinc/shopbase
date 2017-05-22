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
        $this->loadViewsFrom(__DIR__.'/views','Shopbase');
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
        ],'config');

        $this->publishes([
            __DIR__.'/assets' => public_path('/shopbase'),
        ],'assets');

        $this->publishes([
            __DIR__.'/views' => resource_path('/'),
        ],'views');
    }
}
