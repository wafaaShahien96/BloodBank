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
        Edit Post
    </div>

    <div class="card-body">
    <form action="{{route('admin.posts.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="name" value="{{$post->title}}">
          </div>

        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="name" value="{{$post->content}}" >
          </div>

          
            <div class="form-group ">
               <label for="image"> Image </label>
               <input type="file" name="image" id="file" class="form-control">
            </div>
          
          

          <div class="form-group">
            <label  for="category_id">Select Category</label>
          <select class="form-control"  id="category_id" name="category_id"
           value="{{$post->category_id}}">
              <option selected>Choose Category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name ?? ''}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
</div>
@endsection