<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Инициализация роутов.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Здесь Laravel автоматически добавляет префикс 'api' для маршрутов из файла api.php
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Маршруты веб-приложения
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
