<?php

namespace LuanRodrigues\Zapi\Providers;

use Illuminate\Support\ServiceProvider;
use LuanRodrigues\Zapi\Zapi;

class ZapiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('zapi', function ($app) {
            $this->mergeConfigFrom(__DIR__ . '/../config/zapi.php', 'zapi');
            return new Zapi($app['config']['zapi'] ?? []);
        });

        $this->app->alias('zapi', Zapi::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/zapi.php' => config_path('zapi.php'),
        ]);
    }
}
