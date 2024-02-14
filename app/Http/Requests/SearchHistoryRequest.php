<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchHistoryRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'keyword' => 'nullable',
            'apprehension' => 'required | in:all,true,false',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ];
    }
}
