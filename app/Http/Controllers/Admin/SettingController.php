<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateSettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(Setting $setting){
        $settings = Setting::all();
        return view('admin.setting.index',compact('settings'));
    }

    public function edit(Setting $setting){
       return view('admin.setting.edit' , compact('setting') );
    }

    public function update(UpdateSettingRequest $request , Setting $setting){
        $setting->update($request->all());
       return redirect()->route('admin.setting.index')->with('status', 'Setting Updated Successfullty!');
     }
}
