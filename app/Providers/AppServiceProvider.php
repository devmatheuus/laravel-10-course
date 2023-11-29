<?php

namespace App\Providers;

use App\Repositories\{SupportRepository};

use App\Repositories\Interfaces\SupportReposityInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportReposityInterface::class,
            SupportRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
