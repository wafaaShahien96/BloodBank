<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages()
    {
    return [
        'title.required' => 'A title is required',  
        'content.required' => 'A content is required',    
           ];
    }
}
