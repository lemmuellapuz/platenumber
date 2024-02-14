<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRecognizer\VehicleRecognizerByIdRequest;
use App\Http\Requests\VehicleRecognizer\VehicleRecognizerByPlateNumberRequest;
use App\Http\Resources\VehicleResource;
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
    *       @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(
    *              @OA\Property(property="platenumber", type="string", example="NAF 3333", description="Plate number of the vehicle"),
    *              @OA\Property(property="vehicle_make", type="string", example="Toyota", description="Brand name of the vehicle"),
    *              @OA\Property(property="model", type="string", example="Vios", description="Model of the vehicle"),
    *              @OA\Property(property="color", type="string", example="Silver", description="Color of the vehicle"),
    *           ),
    *       ),
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
            
            $vehicle = $this->service->getVehicleByPlateNumber($request);

            if(!$vehicle)
                return response()->json([
                    'message' => 'No records exist for the vehicle.'
                ], 200);

            return new VehicleResource($vehicle);
            
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
     *       @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="string", example="1", description="Vehicle ID"),
    *           ),
    *       ),
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
            
            $vehicle = $this->service->getVehicleByPlateNumber($request);

            if(!$vehicle)
                return response()->json([
                    'message' => 'No records exist for the vehicle.'
                ], 200);

            return new VehicleResource($vehicle);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
    
}
