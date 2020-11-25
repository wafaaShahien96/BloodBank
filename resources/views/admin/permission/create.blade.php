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

    <div class="card">
 
        <div class="card-header">
            Create Permission
        </div>

        <div class="card-body">
        <form action="{{route('admin.permissions.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" >
              </div>


              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection