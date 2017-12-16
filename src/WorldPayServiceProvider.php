<?php

namespace Jtg\WorldPay;

use Illuminate\Support\ServiceProvider;

class WorldPayServiceProvider extends ServiceProvider
{
    /**
     * Summat to go before?
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'worldpay');

    }

    /**
     * Register bits and bobs
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/Config/config.php'  => config_path('worldpay.php'),
            __DIR__ . '/Views/worldpay.blade.php' => resource_path('views/worldpay/worldpay.blade.php'),
        ]);
    }

}
