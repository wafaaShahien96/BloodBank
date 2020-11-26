@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-default-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">

<div class="card">
 
    <div class="card-header">
        Edit Donation Request
    </div>

    <div class="card-body">
    <form action="{{route('admin.donation_request.update' ,$donationRequest->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="patient_name">Patient Name</label>
    <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="patient_name" value="{{$donationRequest->patient_name}}">
      </div>

  <div class="form-group">
        <label for="patient_phone">Patient phone</label>
        <input type="text" class="form-control" id="patient_phone" name="patient_phone" placeholder="patient_phone" value="{{$donationRequest->patient_phone}}">
      </div>

      
      <div class="form-group">
        <label for="hospital_name">Hospital Name</label>
        <input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder="hospital_name" value="{{$donationRequest->hospital_name}}">
      </div>

      <div class="form-group">
        <label for="patient_age">Patient Age</label>
        <input type="text" class="form-control" id="patient_age" name="patient_age" placeholder="patient_age" value="{{$donationRequest->patient_age}}" >
      </div>

      <div class="form-group">
        <label for="bags_number">Bags Number</label>
        <input type="text" class="form-control" id="bags_number" name="bags_number" placeholder="bags_number" value="{{$donationRequest->bags_number}}" >
      </div>

        <div class="form-group">
            <label for="hospital_address">Hospital Address</label>
            <input type="text" class="form-control" id="hospital_address" name="hospital_address" placeholder="hospital_address"value="{{$donationRequest->hospital_address}}" >
          </div>

        <div class="form-group">
            <label for="details">Details</label>
            <input type="text" class="form-control" id="details" name="details" placeholder="details" value="{{$donationRequest->details}}" >
          </div>

    <div class="form-group">
        <label for="blood_type_id">Blood Type</label>
        <select  class="custom-select" type="text" id="blood_type_id" name="blood_type_id" value="{{$donationRequest->blood_type_id}}">
            <option value="1">O-</option>
            <option value="2">O</option>
            <option value="3">A-</option>
            <option value="4">A+</option>
            <option value="5">B-</option>
            <option value="6">B+</option>
            <option value="7">AB-</option>
            <option value="8">AB+</option>
        </select>
      </div>

      <div class="form-group">
        <label  for="city_id">Select City</label>
        <select class="form-control"  id="city_id" name="city_id" value="{{$donationRequest->city_id}}">
          <option selected>Choose City</option>
          @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label  for="client_id">Select Client</label>
        <select class="form-control"  id="client_id" name="client_id" value="{{$donationRequest->client_id}}">
          <option selected>Choose Client</option>
          @foreach ($clients as $client)
              <option value="{{$client->id}}">{{$client->name ?? ''}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-2"> Update </button>
    </form>
    </div>
</div>
</div>
@endsection