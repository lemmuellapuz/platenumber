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


    /**
     * @OA\Post(
     *      path="/search/platenumber",
     *      operationId="searchByPlateNumber",
     *      tags={"Search"},
     *      summary="Search vehicle record by plate number",
     *      description="Returns collection of vehicle information",
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation"
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid Request Data"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *       ),
     *     )
     *
     * Returns vehicle information.
     */

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

    /**
     * @OA\Post(
     *      path="/search/id",
     *      operationId="searchById",
     *      tags={"Search"},
     *      summary="Search vehicle record by vehicle id",
     *      description="Returns collection of vehicle information",
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation"
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid Request Data"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *       ),
     *     )
     *
     * Returns vehicle information.
     */
    
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
