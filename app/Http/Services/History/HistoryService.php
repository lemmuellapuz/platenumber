<?php

namespace App\Http\Services\History;

use App\Models\VehicleLog;

class HistoryService
{

    public function index($request)
    {
        $keyword = trim($request->keyword);

        if (empty($keyword)) {
            return VehicleLog::with('vehicle')->simplePaginate(10);
        }

        return VehicleLog::with('vehicle')
            ->where(function ($query) use ($keyword) {
                $lowerKeyword = strtolower($keyword);

                $query->whereRaw('LOWER(plate_number) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(vehicle_make) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(model) LIKE ?', ["%$lowerKeyword%"])
                    ->orWhereRaw('LOWER(color) LIKE ?', ["%$lowerKeyword%"]);
            })
            ->simplePaginate(10);
    }

}

