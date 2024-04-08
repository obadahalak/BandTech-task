<?php

namespace App\Providers;

use App\Repository\UserInterface;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
