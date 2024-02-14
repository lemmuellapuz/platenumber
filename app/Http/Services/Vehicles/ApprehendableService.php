<?php

namespace App\Http\Services\Vehicles;

use App\Http\Contracts\Vehicles\Apprehendable;
use App\Models\Vehicle;

class ApprehendableService 
{

    private $apprehendInterface;

    public function __construct(Apprehendable $apprehendable)
    {
        $this->apprehendInterface = $apprehendable;
    }

    public function apprehend(Vehicle $vehicle)
    {
        return $this->apprehendInterface->apprehend($vehicle);
    }

    public function discharge(Vehicle $vehicle)
    {
        return $this->apprehendInterface->discharge($vehicle);
    }

}

