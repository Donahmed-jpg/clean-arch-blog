<?php

namespace App\Providers;

use App\Domain\Post\PostRepositoryInterface;
use App\Infrastructure\Post\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            PostRepositoryInterface::class,
            EloquentPostRepository::class
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
