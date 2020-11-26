@extends('layouts.app')
@section('content')
    
<div class="card">
    <div class="card-header">
        Show Client
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <tbody>
                    <tr>
                        <th> Name </th>
                    <td>{{$client->name}}</td>
                    </tr>
                    <tr>
                        <th> Email </th>
                    <td>{{$client->email}}</td>
                    </tr>
                    <tr>
                        <th> Phone </th>
                    <td>{{$client->phone}}</td>
                    </tr>
                    <tr>
                        <th> Date Of Birth </th>
                    <td>{{$client->age}}</td>
                    </tr>
                    <tr>
                        <th> Last Donation Date </th>
                    <td>{{$client->last_donation_date}}</td>
                    </tr>
                    <tr>
                        <th> Blood Type </th>
                    <td>{{$client->blood_type_id}}</td>
                    </tr>
                    <tr>
                        <th> City </th>
                    <td>{{$client->city_id}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection