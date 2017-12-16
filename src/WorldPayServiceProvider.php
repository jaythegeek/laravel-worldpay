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
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');

    }

    /**
     * Register bits and bobs
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config/config.php'  => config_path('worldpay.php'),
            __DIR__ . '/views/worldpay.blade.php' => resource_path('views/worldpay/worldpay.blade.php'),
            __DIR__ . '/controllers/WorldPayController.php' => app_path('Http/Controllers/WorldPayController.php'),
        ]);

        $this->app->make('Jtg\WorldPay\WorldPayController');
    }

}
