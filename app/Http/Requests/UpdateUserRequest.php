<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required',
            'email' => 'required|between:3,64|email|unique:users',
            'password' => 'required',
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
            
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
   
           ];
    }
}
