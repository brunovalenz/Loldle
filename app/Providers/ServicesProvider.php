<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\AlcancesServiceInterface;
use App\Service\EspeciesServiceInterface;
use App\Service\AlcancesService;
use App\Service\EspeciesService;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [
        AlcancesServiceInterface::class => AlcancesService::class,
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
