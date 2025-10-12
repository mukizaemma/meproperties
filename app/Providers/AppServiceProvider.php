<?php

namespace App\Providers;

use App\Models\Facility;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //View::share('services', Service::oldest()->get());
        //View::share('services', Service::oldest()->get());
        //Paginator::useBootstrap();
    }
}
