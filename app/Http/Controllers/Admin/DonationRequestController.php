<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDonationRequestRequest;
use App\Http\Requests\UpdateDonationRequestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Models\City;
use App\Models\BloodType;
use App\Models\Client;

class DonationRequestController extends Controller
{
    public function index(){
        $donationRequests = DonationRequest::all();
        return view('admin.donationRequest.index' , compact('donationRequests'));
    }

    public function create(){
        return view('admin.donationRequest.create')->with('cities' ,City::all())->with('clients' ,Client::all());
    }

    public function store(StoreDonationRequestRequest $request , DonationRequest $donationRequest){
        $donationRequest = DonationRequest::create($request->all());
        return redirect()->route('admin.donation_request.index')->with('status', 'DonationRequest Created Successfullty!');
    }

    public function show(DonationRequest $donationRequest){
        return view('admin.donationRequest.show' ,compact('donationRequest'));
    }

     
    public function edit(DonationRequest $donationRequest){
        return view('admin.donationRequest.edit' , compact('donationRequest'))->with('cities' ,City::all())->with('clients' ,Client::all());
    }

    public function update(UpdateDonationRequestRequest $request , DonationRequest $donationRequest){
        $donationRequest->update($request->all());
        return redirect()->route('admin.donation_request.index')->with('status', 'DonationRequest Updated Successfullty!');
    }

    public function destroy( DonationRequest $donationRequest){
        $donationRequest->delete();
        return back()->with('status', 'DonationRequest Deleted Successfullty!');
    }

    
}
