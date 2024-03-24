<?php

namespace App\Providers;

use App\Interfaces\ExperienceRepositoryInterface;
use App\Repositories\ExperienceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
