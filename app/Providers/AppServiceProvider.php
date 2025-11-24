<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Contracts\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tell Laravel: "Whenever someone asks for the interface, give them the Eloquent implementation."
        // Tell Laravel: "Whenever someone asks for the interface, give them the Eloquent implementation."
        $this->app->bind(
            'App\Repositories\EloquentUserRepository',
            'App\Repositories\EloquentUserRepository'
        );
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::anonymousComponentPath(resource_path('views/layouts'), 'layout');
    }
}
