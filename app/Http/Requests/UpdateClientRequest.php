<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|digits:11',
            'email' => 'required',
            'password'=> 'required',
            'd_o_b'=> 'required',
            'last_donation_date'=> 'required',
            'last_donation_date'=> 'required',
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
           ];
    }
}
