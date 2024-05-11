<?php

namespace App\Providers;

use App\Services\DoctorService;
use App\Services\DoctorServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(DoctorServiceInterface::class, DoctorService::class);
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
