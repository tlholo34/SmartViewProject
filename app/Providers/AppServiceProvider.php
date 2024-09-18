<?php

namespace App\Providers;

use App\Repositories\ConsumptionRepository;
use App\Repositories\Contracts\ConsumptionRepositoryInterface;
use App\Repositories\Contracts\MeterRepositoryInterface;
use App\Repositories\MeterRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MeterRepositoryInterface::class, MeterRepository::class);
        $this->app->bind(ConsumptionRepositoryInterface::class, ConsumptionRepository::class);    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
