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
        <a class="btn btn-danger" href="{{ route('admin.categories.create') }}">
            Add Category
        </a>
    </div>
</div>
</section>

<div class="card">

    <div class="card-header">
          List of Categories
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"></th>
                          <th>  name    </th>
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                
                    <tbody>
                      
                     @foreach($categories as $category)
                        <tr data-entry-id = {{$category->id}} >
                         <td>         </td>
                        <td> {{$category->name }}</td>
                       <td>
                         <a class="btn btn-sm btn-primary" href="{{route('admin.categories.show' , $category->id )}}"> Show </a> 

                         <a class="btn btn-sm btn-danger" href="{{route('admin.categories.edit' , $category->id )}}"> Edit </a> 

                         <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
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


 