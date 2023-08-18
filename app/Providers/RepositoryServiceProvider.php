<?php

namespace App\Providers;

use App\Repositories\DataSmokeDBRepository;
use App\Repositories\Interfaces\DataSmokeDBRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            DataSmokeDBRepositoryInterface::class,
            DataSmokeDBRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
