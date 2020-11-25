<?php

namespace App\Http\Requests;
use App\Models\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'tw_link' => 'required',
            'insta_link' => 'required',
            'youtube_link' => 'required',
        ];
    }  
    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
           ];
    }
    }

