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
            Create City
        </div>

        <div class="card-body">
        <form action="{{route('admin.city.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          
                
                <div class="form-group">
                <label  for="governorate_id">Select Governorate</label>
                <select class="form-control"  id="governorate_id" name="governorate_id">
                  <option selected>Choose Governorate</option>
                  @foreach ($governorates as $governorate)
                      <option value="{{$governorate->id}}">{{$governorate->name ?? ''}}</option>
                  @endforeach
                </select>
              </div>
           
    

            <div class="form-group">
                <label for="name">City</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
