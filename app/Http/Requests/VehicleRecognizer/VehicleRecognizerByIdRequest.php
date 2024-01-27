<?php

namespace App\Http\Requests\VehicleRecognizer;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRecognizerByIdRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'id' => ['required'],
        ];
    }
}
