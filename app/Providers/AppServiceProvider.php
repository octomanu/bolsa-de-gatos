<?php

namespace App\Providers;

use App\Util\EnviromentHelper;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (EnviromentHelper::isLive()){
            URL::forceScheme('https');
        } else {
            URL::forceScheme('http');
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
