<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1' , 'namespace' => 'Api'] , function(){
      Route::get('governorates', 'MainController@governorates' );
      Route::get('cities', 'MainController@cities' );
      Route::post('register', 'AuthController@register' );
      Route::post('login', 'AuthController@login' );
      Route::post('reset-password', 'AuthController@reset' );
      Route::post('new-password', 'AuthController@password' );
      Route::get('settings' , 'MainController@settings');
      Route::post('contacts' , 'MainController@contacts');
      Route::post('donation-request/create' , 'MainController@donationRequestCreate');
      Route::get('bloodTypes' , 'MainController@bloodTypes');
      Route::get('categories' , 'MainController@categories');
      Route::get('posts' , 'MainController@posts');
      Route::get('post' , 'MainController@post');
      Route::post('favourites' , 'MainController@favourites');
      Route::get('myFavourites' , 'MainController@myFavourites');
      Route::post('notificationSettings' , 'MainController@notificationSettings');
      Route::post('profile' , 'AuthController@profile');


      
});

Route::group(['middleware' => 'auth:api'] , function(){
      // Route::post('profile' , 'AuthController@profile');
      
   

});