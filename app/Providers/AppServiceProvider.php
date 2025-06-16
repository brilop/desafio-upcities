<?php

namespace App\Providers;

use App\Repositories\Interfaces\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use App\Services\PersonService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
        $this->app->bind(PersonService::class, function ($app) {
            return new PersonService($app->make(PersonRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
