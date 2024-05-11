<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\AlcancesServiceInterface;
use App\Service\RegiaoServiceInterface;
use App\Service\AlcancesService;
use App\Service\RegiaoService;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [
        AlcancesServiceInterface::class => AlcancesService::class,
        RegiaoServiceInterface::class => RegiaoService::class,
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
