<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MapService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MapService::class, function () {
            return new MapService();
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
