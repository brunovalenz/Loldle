<?php

namespace App\Providers;

use App\Service\AlcancesService;
use App\Service\AlcancesServiceInterface;
use App\Service\RegiaoServiceInterface;
use App\Service\RegiaoService;
use App\Service\RecursosServiceInterface;
use App\Service\RecursosService;
use App\Service\EspeciesServiceInterface;
use App\Service\EspeciesService;
use App\Service\CampeoesServiceInterface;
use App\Service\CampeoesService;
use App\Service\PosicoesServiceInterface;
use App\Service\PosicoesService;
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
        $this->app->bind(RegiaoServiceInterface::class, RegiaoService::class);
        $this->app->bind(EspeciesServiceInterface::class, EspeciesService::class);
        $this->app->bind(CampeoesServiceInterface::class, CampeoesService::class);
        $this->app->bind(PosicoesServiceInterface::class, PosicoesService::class);
        $this->app->bind(RecursosServiceInterface::class, RecursosService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
    }
}
