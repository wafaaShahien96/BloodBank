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
        Create Client
    </div>

    <div class="card-body">
    <form action="{{route('admin.clients.update' , $client->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name"
    value="{{$client->name}}" >
      </div>

      
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$client->email}}" >
      </div>

      
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$client->phone}}">
      </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="password" value="{{$client->password}}" >
      </div>

      
    <div class="form-group">
        <label for="d_o_b">Date of birth</label>
        <input type="date" class="form-control" id="d_o_b" name="d_o_b" placeholder="d_o_b" value="{{$client->d_o_b}}">
      </div>

    <div class="form-group">
        <label for="last_donation_date">Last Donation Date</label>
        <input type="date" class="form-control" id="last_donation_date" name="last_donation_date" placeholder="last_donation_date" 
        value="{{$client->last_donation_date}}">
      </div>

    <div class="form-group">
        <label for="blood_type_id">Last Donation Date</label>
        <select  class="custom-select" type="text" id="blood_type_id" name="blood_type_id" value="{{$client->blood_type_id}}>
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
      <select class="form-control"  id="city_id" name="city_id" value="{{$client->city_id}}" >
          <option selected>Choose City</option>
          @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->name ?? ''}}</option>
          @endforeach
        </select>
      </div>

      <div class="form group">
        <label for="status">Status</label>
        <select class="custom-select" id="status" type="text" name="status" value="{{$client->status}}" >
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select>
        </div>

      <div class="form-group">
        <label for="pin_code">Pin Code</label>
        <input type="number" class="form-control" id="pin_code" name="pin_code" placeholder="pin_code" >
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>


    </form>

    </div>
</div>

</div>
@endsection