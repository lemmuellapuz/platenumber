<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchHistoryRequest;
use App\Http\Requests\VehicleLog\VehicleLogRequest;
use App\Http\Resources\VehicleLogResource;
use App\Http\Services\History\HistoryService;
use App\Http\Services\Vehicles\VehicleLogService;
use App\Models\Vehicle;
use App\Models\VehicleLog;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    /**
         * @OA\Info(
         *      version="1.0.0",
         *      title="Plate Recognition",
         *      description="Plate Recognition API Documentation",
         *      @OA\Contact(
         *          email="ldlapuz@bmqbuilders.com"
         *      )
         * )
    */

    private $service;
    private $logService;

    public function __construct(HistoryService $service, VehicleLogService $logService)
    {   
        $this->service = $service;
        $this->logService = $logService;
    }

    /**
        * @OA\Post(
        *      path="/history",
        *      operationId="index",
        *      tags={"History"},
        *      summary="Displays the history of searched vehicles",
        *      description="Returns History of recognized vehicles",
        *      @OA\RequestBody(
        *          required=true,
        *          @OA\JsonContent(
        *              @OA\Property(property="keyword", type="string", example="NAG 1379", description="Search query for the vehicle"),
        *              @OA\Property(property="apprehension", type="string", example="all", description="Flagging of apprehension. Values can be 'all', 'true', 'false'"),
        *              @OA\Property(property="start_date", type="date", format="date", example="2024-02-14", description="Start date of history"),
        *              @OA\Property(property="end_date", type="date", format="date", example="2024-02-14", description="End date of history"),
        *          ),
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
        * Returns History of recognized vehicles.
    */

    public function index(SearchHistoryRequest $request)
    {
        return VehicleLogResource::collection($this->service->index($request));
    }

    /**
        * @OA\Post(
        *      path="/store",
        *      operationId="store",
        *      tags={"History"},
        *      summary="Saves the captured data.",
        *      description="Saves the captured data that will be displayed in history table.",
        *      @OA\RequestBody(
        *          required=true,
        *          @OA\JsonContent(
        *              @OA\Property(property="vehicle_id", nullable=true, type="string", example="1", description="ID of the vehicle"),
        *              @OA\Property(property="platenumber", type="string", example="NAF 3333", description="Plate number of the vehicle"),
        *              @OA\Property(property="vehicle_make", type="string", example="Toyota", description="Brand name of the vehicle"),
        *              @OA\Property(property="model", type="string", example="Vios", description="Model of the vehicle"),
        *              @OA\Property(property="color", type="string", example="Silver", description="Color of the vehicle"),
        *          ),
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
        * Saves History of recognized vehicles.
    */

    public function store(VehicleLogRequest $request)
    {
        try {
            $vehicle = Vehicle::where('id', $request->vehicle_id)->first();

            $this->logService->logDetails($request, $vehicle);
            
            return response()->json([
                'message' => 'Sucess.'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
        * @OA\Get(
        *      path="/{id}",
        *      operationId="show",
        *      tags={"History"},
        *      summary="Shows the details of the history.",
        *      description="Returns all the details of the history captured in application.",
        *      @OA\Parameter(
        *          name="id",
        *          in="query",
        *          required=true,
        *          description="History ID",
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
        * Returns History details recognized vehicles.
    */

    public function show($id)
    {
        $vehicle_log = VehicleLog::with('vehicle')->where('id', $id)->first();
        
        if(!$vehicle_log)
            return response()->json([
                'message' => 'No records exist for the vehicle.'
            ], 200);

        return VehicleLogResource::make($vehicle_log);
    }
}
