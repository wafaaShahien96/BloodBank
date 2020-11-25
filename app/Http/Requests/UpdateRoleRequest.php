<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required',
            'permission_list' => 'required|array'
         
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
            
           ];
    }
}
