@extends('layouts.app')
@section('page_title')
    Roles
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
        <a class="btn btn-danger" href="{{ route('admin.roles.create') }}">
            Add Role
        </a>
    </div>
</div>
</section>
<div class="container-fluid">

<div class="card">

    <div class="card-header">
          List of Roles
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"> #</th>
                          <th>  name    </th>
                          <th>  Permission    </th>
                       
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                
                    <tbody>
                      
                     @foreach($roles as $role)
                        <tr data-entry-id = {{$role->id}} >
                         <td>    {{$loop->iteration}}      </td>
                        <td> {{$role->name }}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                       <td>
                         <a class="btn btn-sm btn-danger" href="{{route('admin.roles.edit', $role->id )}}"> Edit </a> 

                         <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST"
                             onsubmit="return confirm('Are You Sure')" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-sm btn-success" value="delete">
                        </form>

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


 