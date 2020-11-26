@extends('layouts.app')
@section('page_title')
    Contact
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
        <a class="btn btn-danger" href="{{route('admin.contact.create')}} ">
            Add Contact
        </a>
    </div>
</div>
</section>
<div class="container-fluid">

<div class="card">

    <div class="card-header">
          List of Contact
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="40"></th>
                          <th>  name    </th>
                          <th>  email    </th>
                          <th>  phone    </th>
                          <th>  subject    </th>
                          <th>  massage    </th>
                           <th>  &nbsp;  </th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                      
                     @foreach($contacts as $contact)
                        <tr data-entry-id = {{$contact->id}} >
                         <td>         </td>
                        <td> {{$contact->name }}</td>
                        <td> {{$contact->email }}</td>
                        <td> {{$contact->phone }}</td>
                        <td> {{$contact->subject }}</td>
                        <td> {{$contact->massage }}</td>
                       <td>

                         <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
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


 