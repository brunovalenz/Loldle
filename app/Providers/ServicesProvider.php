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
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
