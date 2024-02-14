<?php

namespace App\Http\Services\Vehicles;

use App\Http\Abstracts\Vehicles\VehicleAbstract;
use App\Http\Contracts\Vehicles\Apprehendable;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle AS VehicleModel;

class Vehicle extends VehicleAbstract implements VehicleDetailsInterface, Apprehendable
{

    public function getVehicleDetailsById(VehicleModel $vehicle): array
    {
        return [
            'details' => $vehicle,
            'type' => 'Car / Motorcycle'
        ];
    }

}

