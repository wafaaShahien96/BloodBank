<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'email' => 'required|email|unique:clients',
            'password'=> 'required',
            'age'=> 'required',
            'last_donation_date'=> 'required',
            'last_donation_date'=> 'required',
            'blood_type_id.*'  => [
                'integer',
            ],
            'blood_type_id'    => [
                'required',
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
