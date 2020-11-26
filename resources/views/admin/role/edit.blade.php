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
            Edit Role
        </div>

        <div class="card-body">
            <form action="{{route('admin.roles.update' , $role->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
             @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$role->name}}" >
              </div>

              <div class="form_group">
                <label for="permission_list" >Permissions
                </label>
                <div class="row">
                    @foreach ($permissions as $permission)
                    <div class="col-sm-3">
                        <div class="checkbox">
                       <label>
                             <input type="checkbox"  name="permission_list[]"  value="{{$permission->id}}"
                             @if ($role->hasPermission($permission->name))
                             checked
                             @endif>
                             
                               {{$permission->name}} 
                            </label>

                        </div>
                    </div>
                        
                    @endforeach

                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
