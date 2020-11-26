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
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="container-fluid">

        <div class="card-body">
        <form action="{{route('admin.categories.update' , $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')
            <div class="form-group">
           <label for="name">Category</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$category->name}}" >
              </div>
              <button type="submit" class="btn btn-primary"> Update </button>
            </form>
        </div>

    </div>
</div>
</div>

@endsection
