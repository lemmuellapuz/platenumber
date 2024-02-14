<?php

namespace App\Http\Abstracts\Vehicles;

use App\Http\Contracts\Vehicles\Apprehendable;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle;

abstract class VehicleAbstract implements VehicleDetailsInterface, Apprehendable
{
    abstract function getVehicleDetailsById(Vehicle $vehicle) : array;

    public function getVehicleDetailsByPlateNumber(string $platenumber) : ?Vehicle
    {
        $data = trim(strip_tags(str_replace(' ', '%', $platenumber)));
        
        return Vehicle::whereRaw('REPLACE(plate_number, " ", "") LIKE ?', ["%$data%"])->first();
    }

    public function apprehend(Vehicle $vehicle) : void{
        $vehicle->update([
            'has_crime' => true
        ]);
    }

    public function discharge(Vehicle $vehicle) : void{
        $vehicle->update([
            'has_crime' => false
        ]);
    }
}