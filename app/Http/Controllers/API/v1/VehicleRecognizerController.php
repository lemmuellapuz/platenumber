<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRecognizer\VehicleRecognizerByIdRequest;
use App\Http\Requests\VehicleRecognizer\VehicleRecognizerByPlateNumberRequest;
use App\Http\Services\Vehicles\VehicleService;
use Illuminate\Http\Request;

class VehicleRecognizerController extends Controller
{
    private $service;

    public function __construct(VehicleService $service)
    {
        $this->service = $service;
    }

    public function searchByPlateNumber(VehicleRecognizerByPlateNumberRequest $request)
    {
        try {
            
            return $this->service->getVehicleByPlateNumber($request);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
    
    public function searchById(VehicleRecognizerByIdRequest $request)
    {
        try {
            
            return $this->service->getVehicleByPlateNumber($request);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
    
}
