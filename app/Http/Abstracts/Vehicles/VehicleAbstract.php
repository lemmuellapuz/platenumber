<?php

namespace App\Http\Abstracts\Vehicles;

use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle;

abstract class VehicleAbstract implements VehicleDetailsInterface
{
    abstract function getVehicleDetailsById(Vehicle $vehicle) : array;

    public function getVehicleDetailsByPlateNumber(string $platenumber) : ?Vehicle
    {
        $data = trim(strip_tags(str_replace(' ', '%', $platenumber)));
        
        return Vehicle::where('plate_number', 'LIKE', $data)->first();
    }
}