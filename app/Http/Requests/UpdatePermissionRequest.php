<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required|unique:roles',
            
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
            
           ];
    }
}
