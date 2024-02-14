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

    /**
        * @OA\Post(
        *      path="/vehicle/{vehicle}/apprehend",
        *      operationId="apprehend",
        *      tags={"Apprehension"},
        *      summary="Apprehends the vehicle.",
        *      description="Update apprehension status of the vehicle to true.",
        *      @OA\Parameter(
        *          name="vehicle",
        *          in="query",
        *          required=true,
        *          description="Vehicle ID",
        *          @OA\Schema(type="string"),
        *      ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful Operation",
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
        * Apprehends the vehicle.
    */

    public function apprehend(Vehicle $vehicle)
    {
        $this->service->apprehend($vehicle);

        return response()->json([
            'message' => 'Apprehended.'
        ], 200);
    }

    /**
        * @OA\Post(
        *      path="/vehicle/{vehicle}/discharge",
        *      operationId="discharge",
        *      tags={"Apprehension"},
        *      summary="Discharges the vehicle.",
        *      description="Update apprehension status of the vehicle to false.",
        *      @OA\Parameter(
        *          name="vehicle",
        *          in="query",
        *          required=true,
        *          description="Vehicle ID",
        *          @OA\Schema(type="string"),
        *      ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful Operation",
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
        * Discharges the vehicle.
    */

    public function discharge(Vehicle $vehicle)
    {
        $this->service->discharge($vehicle);

        return response()->json([
            'message' => 'Discharged.'
        ], 200);
    }
    
}
