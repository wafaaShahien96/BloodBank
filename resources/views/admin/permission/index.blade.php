@extends('layouts.app')
@section('page_title')
    Permission
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
        <a class="btn btn-danger" href="{{ route('admin.permissions.create') }}">
            Add Permission
        </a>
    </div>
</div>
</section>

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
                        
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                
                    <tbody>
                      
                     @foreach($permissions as $permission)
                        <tr data-entry-id = {{$permission->id}} >
                         <td>   {{$loop->iteration}}       </td>
                        <td> {{$permission->name }}</td>
                       
                       <td>
                        

                         <a class="btn btn-sm btn-danger" href="{{route('admin.permissions.edit' , $permission->id )}}"> Edit </a> 

                         <form action="{{ route('admin.permissions.destroy',$permission->id) }}" method="POST"
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


 