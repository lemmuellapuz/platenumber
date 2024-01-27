<?php

namespace App\Http\Services\Vehicles;

use App\Http\Abstracts\Vehicles\VehicleAbstract;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Models\Vehicle;

class VehicleService 
{

    private $vehicleInterface;

    public function __construct(VehicleDetailsInterface $interface)
    {
        $this->vehicleInterface = $interface;
    }

    public function getVehicleByPlateNumber($request)
    {
        return $this->vehicleInterface->getVehicleDetailsByPlateNumber($request->platenumber);
    }

    public function getVehicleById($request)
    {
        return $this->vehicleInterface->getVehicleDetailsById($request->id);
    }

}

