<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'plate_number' => $this->plate_number,
            'vehicle_make' => $this->vehicle_make,
            'type' => $this->type,
            'model' => $this->model,
            'color' => $this->color,
            'date_of_last_registration' => $this->date_of_last_registration,
            'status' => $this->status,
            'has_crime' => $this->has_crime,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
