<?php

namespace App\Http\Contracts\Vehicles;

use App\Models\Vehicle;
use App\Models\VehicleLog;

interface VehicleLogInterface
{

    /**
     * @param Request $request
     * @return VehicleLog
     */
    public function logDetails($request, $vehicle) : VehicleLog;

}