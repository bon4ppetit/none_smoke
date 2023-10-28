<?php

namespace App\Providers;

use App\Repositories\SmokeDBRepository;
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
            SmokeDBRepository::class
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
