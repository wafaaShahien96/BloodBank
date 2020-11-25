@extends('layouts.app')
@section('page_title')
    Donation Request
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
    <a class="btn btn-danger" href="{{route('admin.donation_request.create')}}">
            Add Donation Request
        </a>
    </div>
</div>
</section>

<div class="card">

    <div class="card-header">
          List of clients
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"></th>
                          <th>  patient_name    </th>
                          <th>  patient_phone    </th>
                          <th>  patient_age    </th>
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>

                    <tbody>
                      
                     @foreach($donationRequests as $donationRequest)
                        <tr data-entry-id = {{$donationRequest->id}} >
                         <td>         </td>
                        <td> {{$donationRequest->patient_name }}</td>
                        <td> {{$donationRequest->patient_phone }}</td>
                        <td> {{$donationRequest->patient_age }}</td>
                       <td> 

                        <a class="btn btn-sm btn-primary" href="{{route('admin.donation_request.show',$donationRequest->id)}}"> Show </a> 

                         <a class="btn btn-sm btn-danger" href="{{route('admin.donation_request.edit',$donationRequest->id)}}"> Edit </a> 

                         <form action="{{ route('admin.donation_request.update', $donationRequest->id) }}" method="POST"
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


 