<?php

namespace App\Http\Requests\VehicleLog;

use Illuminate\Foundation\Http\FormRequest;

class VehicleLogRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'vehicle_id' => ['nullable'],
            'platenumber' => ['required'],
            'vehicle_make' => ['required'],
            'model' => ['required'],
            'color' => ['required'],
        ];
    }
}
