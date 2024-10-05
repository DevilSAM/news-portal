<?php

namespace App\Providers;

use App\Services\TelegramBot;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Telegram\Bot\Api;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TelegramBot::class, function (Application $app) {
            return new TelegramBot($app->make(Api::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
