<?php

namespace App\Providers;

use App\Models\Vehicle;
use App\Observers\ParkingObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\VehicleObserver;
use App\Models\Parking;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Vehicle::observe(VehicleObserver::class);
        Parking::observe(ParkingObserver::class);
    }
}
