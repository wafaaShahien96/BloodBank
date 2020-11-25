@extends('layouts.app')
@section('page_title')
    Governorates
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
        <a class="btn btn-danger" href="{{ route('admin.governorates.create') }}">
            Add Governorate
        </a>
    </div>
</div>
</section>

<div class="card">

    <div class="card-header">
          List of governorates
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
                      
                     @foreach($governorates as $governorate)
                        <tr data-entry-id = {{$governorate->id}} >
                         <td> {{$loop->iteration}}        </td>
                        <td> {{$governorate->name }}</td>
                       <td>
                         <a class="btn btn-sm btn-danger" href="{{route('admin.governorates.edit' , $governorate->id )}}"> Edit </a> 

                         <form action="{{ route('admin.governorates.destroy', $governorate->id) }}" method="POST"
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

            @if (!$governorates)
            <div class="alert alert-danger" role="alert">
                 No Data Found
            </div>
            @endif

          </div>
     
</div>
    
 @endsection


 