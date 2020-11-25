<?php

namespace App\Http\Requests;
use App\Models\Governorate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGovernorateRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }  
    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
           ];
    }
    }

