<?php

namespace App\Providers;

use App\Services\TokenAuthService;
use Illuminate\Support\ServiceProvider;

class TokenAuthServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(TokenAuthService::class, function ($app) {
            return new TokenAuthService();
        });
    }

}
