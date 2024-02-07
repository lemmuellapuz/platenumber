<?php

namespace App\Http\Services\History;

use App\Models\VehicleLog;
use Carbon\Carbon;

class HistoryService
{

    public function index($request)
    {
        $keyword = trim($request->keyword);

        $logs = VehicleLog::with('vehicle');

        if (!empty($keyword)) {
            $logs->where(function ($query) use ($keyword) {
                $lowerKeyword = strtolower($keyword);

                $query->whereRaw('LOWER(plate_number) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(vehicle_make) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(model) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(color) LIKE ?', ["%$lowerKeyword%"]);
            });
        }
        
        if (!empty($request->start_date) && !empty($request->end_date))
        {
            $logs->whereBetween('created_at', [Carbon::parse($request->start_date . ' 00:00:00'), Carbon::parse($request->end_date . ' 23:59:59')]);
        }

        return $logs->orderBy('created_at', 'DESC')->simplePaginate(10);
    }

}

