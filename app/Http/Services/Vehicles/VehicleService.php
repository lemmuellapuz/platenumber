<?php

namespace App\Http\Services\Vehicles;

use App\Http\Abstracts\Vehicles\VehicleAbstract;
use App\Http\Contracts\Vehicles\VehicleDetailsInterface;
use App\Http\Contracts\Vehicles\VehicleLogInterface;
use App\Models\Vehicle;

class VehicleService 
{

    private $vehicleInterface;
    private $logService;

    public function __construct(VehicleDetailsInterface $interface, VehicleLogService $logService)
    {
        $this->vehicleInterface = $interface;
        $this->logService = $logService;
    }

    public function getVehicleByPlateNumber($request)
    {
        $vehicle = $this->vehicleInterface->getVehicleDetailsByPlateNumber($request->platenumber);
        $this->logService->logDetails($request, $vehicle);

        return $vehicle;
    }

    public function getVehicleById($request)
    {
        return $this->vehicleInterface->getVehicleDetailsById($request->id);
    }

}

