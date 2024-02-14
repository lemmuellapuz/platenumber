<?php

namespace App\Http\Contracts\Vehicles;

use App\Models\Vehicle;

interface Apprehendable
{

    /**
     * @param Vehicle $vehicle
     * @return void
     */
    public function apprehend(Vehicle $vehicle) : void;

    /**
     * @param Vehicle $vehicle
     * @return void
     */
    public function discharge(Vehicle $vehicle) : void;

}