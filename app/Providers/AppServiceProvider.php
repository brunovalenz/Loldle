<?php

namespace App\Providers;

use App\Service\AlcancesService;
use App\Service\EspeciesService;
use App\Service\AlcancesServiceInterface;
use App\Service\EspeciesServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AlcancesServiceInterface::class, AlcancesService::class);
        $this->app->bind(EspeciesServiceInterface::class, EspeciesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
