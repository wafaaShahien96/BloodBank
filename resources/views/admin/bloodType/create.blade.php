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
            Create bloodType
        </div>

        <div class="card-body">
        <form action="{{route('admin.bloodtype.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">bloodType</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" >
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    </div>
@endsection
