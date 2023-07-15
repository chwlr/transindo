<?php

namespace App\Providers;

use App\Repositories\CarRepository;
use App\Repositories\Implementation\CarRepositoryImpl;
use App\Repositories\Implementation\RentCarRepositoryImpl;
use App\Repositories\Implementation\UserRepositoryImpl;
use App\Repositories\RentCarRepository;
use App\Repositories\UserRepository;
use App\Services\CarService;
use App\Services\Implementation\CarServiceImpl;
use App\Services\Implementation\RentCarServiceImpl;
use App\Services\RentCarService;
use App\Services\UserService;
use App\Services\Implementation\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
        $this->app->bind(CarRepository::class, CarRepositoryImpl::class);
        $this->app->bind(CarService::class, CarServiceImpl::class);
        $this->app->bind(RentCarRepository::class, RentCarRepositoryImpl::class);
        $this->app->bind(RentCarService::class, RentCarServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
