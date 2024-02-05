<?php

namespace App\Http\Contracts\Vehicles;

use App\Models\Vehicle;

interface VehicleLogInterface
{

    /**
     * @param Request $request
     * @return void
     */
    public function logDetails($request, $vehicle) : void;

}