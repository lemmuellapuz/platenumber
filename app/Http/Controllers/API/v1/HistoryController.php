<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchHistoryRequest;
use App\Http\Resources\VehicleLogResource;
use App\Http\Services\History\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    private $service;

    public function __construct(HistoryService $service)
    {   
        $this->service = $service;
    }

    public function __invoke(SearchHistoryRequest $request)
    {
        return VehicleLogResource::collection($this->service->index($request));
    }
}
