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
            Edit Permission
        </div>

        <div class="card-body">
            <form action="{{route('admin.permissions.update' , $permission->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
             @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$permission->name}}" >
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
