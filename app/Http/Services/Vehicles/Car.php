<?php

namespace App\Http\Services\Vehicles;

use App\Http\Abstracts\Vehicles\VehicleAbstract;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle;

class Car extends VehicleAbstract implements VehicleDetailsInterface
{

    public function getVehicleDetailsById(Vehicle $vehicle): array
    {
        return [
            'details' => $vehicle,
            'type' => 'Car'
        ];
    }

}

