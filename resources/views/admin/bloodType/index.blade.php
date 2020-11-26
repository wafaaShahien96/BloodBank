@extends('layouts.app')
@section('page_title')
    BloodType
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
        <a class="btn btn-danger" href="{{ route('admin.bloodtype.create') }}">
            Add BloodType
        </a>
    </div>
</div>
</section>
<div class="container-fluid">
<div class="card">

    <div class="card-header">
          List of bloddType
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"></th>
                          <th>  bloodType    </th>
                    </tr>
                </thead>
                
                    <tbody>
                      
                     @foreach($bloodTypes as $bloodType)
                        <tr data-entry-id = {{$bloodType->id}} >
                         <td>         </td>
                        <td> {{$bloodType->name }}</td>
                      
                        </tr>
                     @endforeach 
              
                </tbody>


            </table>
            </div>
          </div>
     
</div>
</div>
 @endsection


 