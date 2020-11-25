<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contact;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'massage' => 'required',
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',  
           ];
    }
}
