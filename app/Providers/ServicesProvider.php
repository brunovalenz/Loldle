<?php

namespace App\Providers;

use App\Models\Especies;
use Illuminate\Support\ServiceProvider;
use App\Service\AlcancesServiceInterface;
use App\Service\RegiaoServiceInterface;
use App\Service\RegiaoService;
use App\Service\AlcancesService;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [
        AlcancesServiceInterface::class => AlcancesService::class,
        RegiaoServiceInterface::class => RegiaoService::class,
        EspeciesServiceInterface::class => EspeciesService::class,
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
