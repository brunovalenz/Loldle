<?php

namespace App\Providers;

use App\Service\{
    AlcancesService,
    AlcancesServiceInterface,
    RegioesServiceInterface,
    RegioesService,
    RecursosServiceInterface,
    RecursosService,
    EspeciesServiceInterface,
    EspeciesService,
    CampeoesServiceInterface,
    CampeoesService,
    PosicoesServiceInterface,
    PosicoesService,
    Campeoes_PosicoesServiceInterface,
    Campeoes_PosicoesService,
    Especies_CampeoesServiceInterface,
    Especies_CampeoesService,
    UsersService,
    UsersServiceInterface
};

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(AlcancesServiceInterface::class, AlcancesService::class);
        $this->app->bind(RegioesServiceInterface::class, RegioesService::class);
        $this->app->bind(EspeciesServiceInterface::class, EspeciesService::class);
        $this->app->bind(CampeoesServiceInterface::class, CampeoesService::class);
        $this->app->bind(PosicoesServiceInterface::class, PosicoesService::class);
        $this->app->bind(RecursosServiceInterface::class, RecursosService::class);
        $this->app->bind(Campeoes_PosicoesServiceInterface::class, Campeoes_PosicoesService::class);
        $this->app->bind(Especies_CampeoesServiceInterface::class, Especies_CampeoesService::class);
        $this->app->bind(UsersServiceInterface::class, UsersService::class);
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

    }
}
