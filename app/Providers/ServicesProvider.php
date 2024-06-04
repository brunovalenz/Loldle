<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [
        AlcancesServiceInterface::class => AlcancesService::class,
        EspeciesServiceInterface::class => EspeciesService::class,
        RegiaoServiceInterface::class => RegiaoService::class,
        CampeoesServiceInterface::class => CampeoesService::class,
        PosicoesServiceInterface::class => PosicoesService::class,
        RecursoServiceInterface::class => RecursoService::class,
        Campeoes_PosicoesServiceInterface::class => Campeoes_PosicoesService::class,
        Especies_CampeoesServiceInterface::class => Especies_CampeoesService::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
