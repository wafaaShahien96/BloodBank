<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\Models\User;
use DB;

class AuthController extends Controller
{
    /// دي ميثود ال register ///
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
        'name' => 'required|max:50',
        'email'=> 'required|unique:clients',
        'phone'=> 'required',
        'city_id' => 'required',
        'password' => 'required|confirmed',
        'last_donation_date' =>'required',
        'blood_type_id' => 'required',
        ]);

        if ($validator->fails()){
           return responseJson(0, $validator->errors()->first(),$validator->errors());
           }

      $request->merge(['password' =>bcrypt($request->password)]);
      $client = Client::Create($request->all());
      $client->api_token=Str::random($length=60);
      $client ->save();
      
        return responseJson(1 , "register Successfully" , [
          'api_token'=>$client->api_token,
          'client'=>$client]);
    }


 /// دي ميثود ال login  ///

    public function login(Request $request)
       {
          $validator = Validator::make($request->all(),[
            'phone'=> 'required',
            'password' => 'required',
             ]);

           if ($validator->fails()){
           return responseJson(0, $validator->errors()->first(),$validator->errors());
              }

             //  $auth= auth()->guard('api')->validate($request->all());
           $client = Client::where('phone',$request->phone)->first();
             if($client)
              {
              if(Hash::check($request->password,$client->password))
               {
                 return responseJson(1, $msg=" login Successful",[
                   'api_token' =>$client->api_token,
                   'client'=>$client
                    ]);
                 }else{
                   return responseJson(0, $msg=" invalid Password");
                }
               }else{
                  return responseJson(0, $msg="invalid Number");
                  }
       }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(),
          [
        'phone'=> 'required',
          ]);
         if ($validator->fails())
         {
            return responseJson(0, $validator->errors()->first(),$validator->errors());
         }
          $user = Client::where('phone' , $request->phone)->first();
         if($user){
        $code = rand(11111,99999);
        $update = $user->update(['pin_code'=>$code]);
        if($update)
        {
     Mail::to($user->email)
    ->bcc("waf2.a.shahien@gmail.com‏")
    ->send(new ResetPassword($code));
         return  responseJson(1, "برجاء فحص هاتفك",['pin_code_for_test'=>$code]); 
        }else{
            return  responseJson(0, "حدث خطا حاول مره اخري"); 
        }
   }else{
            return  responseJson(0, "لا يوجد حساب مرتبط بهذا");
        }
    }

  public function password(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'pin_code'=> 'required',
        'password'=> 'required|confirmed',
        'phone'   => 'required'
          ]);
    
       if ($validator->fails())
         {
           return responseJson(0, $validator->errors()->first(),$data);
         }
     
      $user = Client::where('pin_code' , $request->pin_code)->where('pin_code','!=',0)->first();
      if($user){

        $user->password = bcrypt($request->password);
        $user->pin_code = null;

    if($user->save())
    {
        return  responseJson(1,'تم تغيير كلمه المرور بنجاح');
    }else{
        return  responseJson(0,'حدث خطا , حاول مره اخري');
    }
      }else{
        return  responseJson(0, "لا يوجد حساب مرتبط بهذا");
           }
    }

    public function profile(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
           'password' => 'required',
           'email' => Rule::unique('clients'),
           'phone' => Rule::unique('clients')
        ]);
        if ($validator->fails())
        {
           return responseJson(0, $validator->errors()->first(),$validator->errors());
        }
        // $loginUser =$request->all();
        $loginUser = DB::table('clients')->update($request->all());

        // $loginUser->update($request->all());
dd($loginUser);

        $loginUser->save();
        $data =[
            'user' =>$request->user()->fresh()
               ]; 
        return responseJson(1 , "تم تحديث البيانات ", $data);
    }

   

  }

