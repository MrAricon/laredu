<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as
ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('api')
                ->group(base_path('routes/lareduapi.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
