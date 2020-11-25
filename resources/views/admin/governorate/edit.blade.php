@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-success ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edit Governorate
        </div>

        <div class="card-body">
        <form action="{{route('admin.governorates.update' , $governorate->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')
            <div class="form-group">
           <label for="name">Governorate</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$governorate->name}}" >
              </div>
              <button type="submit" class="btn btn-primary"> Update </button>
            </form>
        </div>

    </div>
@endsection
