@extends('layouts.app')
@section('page_title')
    Categories
@endsection
@section('content')
    
<section class="content">

    @if (session('status'))
    <div class="alert alert-default-success">
        {{ session('status') }}
    </div>
@endif

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-danger" href="{{ route('admin.posts.create') }}">
            Add Post
        </a>
    </div>
</div>
</section>
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        List Of Posts
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover data-table">
                <thead>
                    <tr>
                        <th width="40">#</th>
                          <th>  title    </th>
                          <th>  image    </th>
                          <th>  content    </th>
                          <th>  category_id   </th>
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr data-entry-id = {{$post->id}}>
                        <td> {{$loop->iteration}}        </td>
                        <td> {{$post->title }}</td>
                  <td><img src="{{ asset('/storage/'.$post->image ) }}" width="50"> </td>  
                    <td> {{$post->content }}</td>
                    <td> {{$post->category_id }}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href={{route('admin.posts.edit' , $post->id)}}> Edit </a> 
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Are You Sure')" style="display: inline-block;">
                           <input type="hidden" name="_method" value="DELETE">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <input type="submit" class="btn btn-sm btn-success" value="delete">
                    </td>
                    </tr>
                  @endforeach 
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

@endsection