<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\City;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('admin.client.index' , compact('clients'));
    }

    public function create(){
        return view('admin.client.create')->with('cities' , City::all())->with('bloodTypes' ,BloodType::all());
    }

    public function store(StoreClientRequest $request , Client $client){
        $client = Client::create($request->all());

        return redirect()->route('admin.clients.index')->with('status', 'Client Created Successfully!');;

    }

    public function show(Client $client)
    {
         return view('admin.client.show' ,compact('client'));
    }
    public function edit(Client $client){
        return view('admin.client.edit' , compact('client'))->with('cities' , City::all());
    }

    public function update(UpdateClientRequest $request , Client $client){
        $client->update($request->all());
        return redirect()->route('admin.clients.index')->with('status', 'Client Updated Successfully!');
    }

    public function destroy(Client $client){
        $client->delete();
        return back()->with('status', 'Client Deleted Successfully!');
    }

}
