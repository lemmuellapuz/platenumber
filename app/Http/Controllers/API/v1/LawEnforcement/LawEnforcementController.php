<?php

namespace App\Http\Controllers\API\v1\LawEnforcement;

use App\Http\Controllers\Controller;
use App\Http\Services\Vehicles\ApprehendableService;
use App\Models\Vehicle;

class LawEnforcementController extends Controller
{
    private $service;

    public function __construct(ApprehendableService $service)
    {
        $this->service = $service;
    }

    public function apprehend(Vehicle $vehicle)
    {
        $this->service->apprehend($vehicle);

        return response()->json([
            'message' => 'Apprehended.'
        ], 200);
    }

    public function discharge(Vehicle $vehicle)
    {
        $this->service->discharge($vehicle);

        return response()->json([
            'message' => 'Discharged.'
        ], 200);
    }
    
}
