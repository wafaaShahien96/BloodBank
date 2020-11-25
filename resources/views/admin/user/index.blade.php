@extends('layouts.app')
@section('page_title')
    Users
@endsection
@section('content')


<section class="content">

    @if (session('status'))
    <div class="alert alert-default-success">
        {{ session('status') }}
    </div>
@endif

@inject('role', 'App\Models\Role')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-danger" href="{{ route('admin.users.create') }}">
            Add User
        </a>
    </div>
</div>
</section>

<div class="card">

    <div class="card-header">
          List of Users
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"> #</th>
                          <th>  name    </th>
                          <th>  Email    </th>
                          <th>  Roles   </th>
                       
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                
                    <tbody>
                        @foreach($users as $user)
                        <tr data-entry-id = {{$user->id}} >
                         <td>    {{$loop->iteration}}      </td>
                               <td> {{$user->name }}</td>
                               <td> {{$user->email }}</td>
                              
                               <td>
                                @foreach($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{route('admin.users.edit',$user->id )}}"> Edit </a> 
   
                            <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST"
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
    @endsection