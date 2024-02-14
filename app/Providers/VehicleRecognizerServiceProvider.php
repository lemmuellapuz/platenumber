<?php

namespace App\Providers;

use App\Http\Contracts\Vehicles\Apprehendable;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Http\Services\Vehicles\Vehicle;
use Illuminate\Support\ServiceProvider;

class VehicleRecognizerServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this->app->bind(VehicleDetailsInterface::class, Vehicle::class);
        $this->app->bind(Apprehendable::class, Vehicle::class);
    }

}
