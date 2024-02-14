<?php

namespace App\Http\Services\Vehicles;

use App\Http\Abstracts\Vehicles\VehicleAbstract;
use App\Http\Contracts\Vehicles\Apprehendable;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle;

class Car extends VehicleAbstract implements VehicleDetailsInterface, Apprehendable
{

    public function getVehicleDetailsById(Vehicle $vehicle): array
    {
        return [
            'details' => $vehicle,
            'type' => 'Car'
        ];
    }

}

