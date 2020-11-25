<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\BloodType;
use App\Models\DonationRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\ClientGovernorate;

class MainController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson($status=1,$msg='success',$governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function($query)use($request){
           if($request->has($key='governorate_id'))
           {
             $query->where('governorate_id',$request->governorate_id);
           } 
        })->get();
        return responseJson($status= 1,$msg='success',$cities);
    }

    public function contacts(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'massage'=>'required',
        ]);
        if ($validator->fails()){
            return responseJson(0, $validator->errors()->first(),$validator->errors());
            }
        $contact = Contact::Create($request->all());
        return responseJson(1 , 'successful' ,$contact);
    }

    public function settings(){
        $settings = Setting::all();
        return responseJson($status=1,$msg='successful',$settings); 
    }

    public function bloodTypes(Request $request){
        $bloodTypes = BloodType::all();
        return responseJson(1 , 'successfully' , ['bloodTypes'=> $bloodTypes]);
    }

    public function categories(Request $request){
        $categories = Category::all();
        return responseJson($status=1,$msg='success',$categories);
    }

    public function posts(Request $request){

        $posts = Post::where(function($query)use($request){
            if($request->has($key='category_id'))
            {
              $query->where('category_id',$request->category_id);
            } 
         })->paginate(10);
         return responseJson($status= 1,$msg='success',$posts);

    }

    public function post(Request $request){
        $post = Post::with('category')->find($request->post_id);
        if(!$post)
        {
            return responseJson($status= 0,$msg='404 not found');
        }
        return responseJson($status= 1,$msg='success',$post);
    }

    public function favourites(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'post_id' => 'required|exists:posts,id'
        ]);
        if ($validator->fails()){
            return responseJson(0, $validator->errors()->first(),$validator->errors());
            }
          $toggle = $request->user()->posts()->toggle($request->post_id);
          return responseJson(1 , 'success' , $toggle);
    }

    public function myFavourites(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(10); 
        return responseJson(1 , 'loaded' , $posts);
    }

    public function notification(Request $request){

    }

    public function notificationSettings(Request $request){
                 
            if($request->has('governorate_id'))
            {
              $client->cities()->detach($request->city_id);
              $client->cities()->attach($request->city_id);
            }
            if($request->has('blood_type'))
            {
              $bloodType = BloodType::where('name' , $request->blood_type)->first();
              $client->bloodTypes()->detach($bloodType->id);
              $client->bloodTypes()->attach($bloodType->id);
            }
            $data =['user'=>$request->user]; 
            return responseJson(1 , "تم تحديث البيانات ", $data);
    }

    


    public function donationRequestCreate(Request $request){
        $validator = Validator::make($request->all(),
        [
          'patient_name' => 'required',
          'patient_phone' => 'required',
          'hospital_name'=> 'required',
          'patient_age'=> 'required',
          'blood_type_id'=> 'required',
          'city_id'=> 'required',
          'bags_number'  => 'required',
        ]);
        if ($validator->fails()){
         return responseJson(0, $validator->errors()->first(),$validator->errors());
         }
         $donationRequest = DonationRequest::Create($request->all());
        //  dd($donationRequest);

        
        
    
      }

    


}
