<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;


class CityController extends Controller
{
    public function index(){
       $cities = City::all();
       return view('admin.city.index' , compact('cities'));
    }

    public function create(){
        return view('admin.city.create')->with('governorates' , Governorate::all());
    }

    public function store(StoreCityRequest $request ,City $city){
        $city = City::create($request->all());
        return redirect()->route('admin.city.index')->with('status', 'City Created Successfullty!');
    }

    public function edit(City $city){
        return view('admin.city.edit' ,compact('city'))->with('governorates' , Governorate::all());
    }

    public function update(UpdateCityRequest $request,City $city){
        $city->update($request->all());
        return redirect()->route('admin.city.index')->with('status', 'City Updated Successfullty!');
    }

    public function destroy($id){
        $city = City::find($id);

        if(empty($city)) {
            return;
        }
    
        $city->delete();
        return back()->with('status', 'City Deleted Successfullty!');;
    }
}