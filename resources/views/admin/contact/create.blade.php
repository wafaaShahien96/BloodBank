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
        Create Contact
    </div>

    <div class="card-body">
    <form action="{{route('admin.contact.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name" >
      </div>

      
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" >
      </div>

      
    <div class="form-group">
     <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" >
      </div>

      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="subject" >
      </div>

      
      <div class="form-group">
        <label for="massage">Massage</label>
        <input type="text" class="form-control" id="massage" name="massage" placeholder="massage" >
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
</div>  
@endsection