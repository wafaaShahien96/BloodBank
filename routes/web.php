<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){  
      Route::resource('governorates', 'GovernorateController');
      Route::resource('city', 'CityController');
      Route::resource('categories', 'CategoryController');
      Route::resource('bloodtype', 'BloodTypeController');
      Route::resource('posts', 'PostController');
      Route::resource('clients', 'ClientController');
      Route::resource('contact', 'ContactController');
      Route::resource('setting', 'SettingController');
      Route::resource('donation_request', 'DonationRequestController');
      Route::resource('roles', 'RoleController');
      Route::resource('permissions', 'PermissionController');
      Route::resource('users', 'UserController');
    });

