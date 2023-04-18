<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthenticationController;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\JobRepositoryInterface;

use App\Repositories\JobRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
