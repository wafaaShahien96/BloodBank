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
            Create User
        </div>

        <div class="card-body">
            <form action="{{route('admin.users.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$user->name}}" >
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}">
              </div>
    
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" value="{{$user->password}}">
              </div>
        
              <div class="form_group">
                <label for="roles" >User Role </label><br>
                <div class="row">
                    <div class="col-md-4">
                 <input id="selectAll" type="checkbox">
                <label for="selectAll" name="selectAll" > Select All</label>
                    </div>
                </div>
              
                    <div class="row">
                        @foreach ($roles as $role)
                        <div class="col-sm-3">
                            <div class="checkbox">
                           <label>
                                 <input type="checkbox"  name="roles[]"  value="{{$role->id}}"
                                 @if ($user->hasRole($role->name))
                                 checked
                                 @endif>
                                 {{$role->name}} 

                                </label>
    
                            </div>
                        </div>
                            
                        @endforeach
    
                    </div>

              </div>               
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </div>
              </div>
            </form>
        </div>
    </div>
    
    @endsection
    @push('scripts')
    <script>
        $("#selectAll").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    });
    
    </script>
    @endpush