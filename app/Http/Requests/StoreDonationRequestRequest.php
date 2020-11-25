<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DonationRequest;


class StoreDonationRequestRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'patient_name' => 'required',
          'patient_phone' => 'required',
          'hospital_name'=> 'required',
          'patient_age'=> 'required',
          'blood_type_id'=> 'required',
          'city_id'=> 'required',
          'bags_number'  => 'required',
        ];
    }
}
