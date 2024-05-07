<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\AlcancesServiceInterface;
use App\Service\AlcancesService;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [
        AlcancesServiceInterface::class => AlcancesService::class,
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
