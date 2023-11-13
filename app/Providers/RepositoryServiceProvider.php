<?php

namespace App\Providers;

use App\Repositories\SmokeRepository;
use App\Repositories\Interfaces\SmokeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            SmokeRepositoryInterface::class,
            SmokeRepository::class
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
