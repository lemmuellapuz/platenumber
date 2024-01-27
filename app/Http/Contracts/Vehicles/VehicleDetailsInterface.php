<?php

namespace App\Http\Contracts\Vehicles;

use App\Models\Vehicle;

interface VehicleDetailsInterface
{

    /**
     * @param Vehicle $vehicle
     * @return array
     */
    public function getVehicleDetailsById(Vehicle $vehicle) : array;

    /**
     * @param string $platenumber
     * @return ?Vehicle
     */
    public function getVehicleDetailsByPlateNumber(string $platenumber): ?Vehicle;

}