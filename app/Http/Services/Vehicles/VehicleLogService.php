<?php

namespace App\Http\Services\Vehicles;

use App\Http\Contracts\Vehicles\VehicleLogInterface;
use App\Models\Vehicle;
use App\Models\VehicleLog;

class VehicleLogService implements VehicleLogInterface
{

    public function logDetails($request, $vehicle): void
    {
        
        VehicleLog::create([
            'vehicle_id' => $vehicle->id,
            'plate_number' => $request->platenumber,
            'vehicle_make' => $request->vehicle_make,
            'model' => $request->model,
            'color' => $request->color,
        ]);

    }

}

