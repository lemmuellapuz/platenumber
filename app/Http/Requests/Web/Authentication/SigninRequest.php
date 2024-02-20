<?php

namespace App\Http\Requests\Web\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required']
        ];
    }
}
