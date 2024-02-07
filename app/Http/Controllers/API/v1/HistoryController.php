<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchHistoryRequest;
use App\Http\Resources\VehicleLogResource;
use App\Http\Services\History\HistoryService;
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

    public function __construct(HistoryService $service)
    {   
        $this->service = $service;
    }

    /**
        * @OA\Post(
        *      path="/history",
        *      operationId="index",
        *      tags={"History"},
        *      summary="Displays the history of searched vehicles",
        *      description="Returns History of recognized vehicles",
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
