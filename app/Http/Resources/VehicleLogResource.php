<?php

namespace App\Http\Resources;

use App\Models\Vehicle;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleLogResource extends JsonResource
{
    public function toArray($request)
    {
        $lto = $this->whenLoaded('vehicle');

        return [
            'id' => $this->id,
            'lto' => $lto ? new VehicleResource($lto) : null,
            'captured' => [
                'plate_number' => $this->plate_number,
                'vehicle_make' => $this->vehicle_make,
                'model' => $this->model,
                'color' => $this->color,
                'created_at' => $this->created_at->toDateTimeString(),
                'updated_at' => $this->updated_at->toDateTimeString(),
            ]
            
        ];
    }
}
