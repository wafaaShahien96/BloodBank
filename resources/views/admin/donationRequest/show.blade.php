@extends('layouts.app')
@section('content')
    
<div class="card">
    <div class="card-header">
        Show DonationRequest
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <tbody>
                    <tr>
                        <th> Patient Name </th>
                    <td>{{$donationRequest->patient_name}}</td>
                    </tr>
                    <tr>
                        <th> Patient Phone </th>
                    <td>{{$donationRequest->patient_phone}}</td>
                    </tr>
                    <tr>
                        <th> Hospital Name </th>
                    <td>{{$donationRequest->hospital_name}}</td>
                    </tr>
                    <tr>
                        <th> Patient Age </th>
                    <td>{{$donationRequest->patient_age}}</td>
                    </tr>
                    <tr>
                        <th> Bags Number </th>
                    <td>{{$donationRequest->bags_number}}</td>
                    </tr>
                    <tr>
                        <th> Hospital Address </th>
                    <td>{{$donationRequest->hospital_address}}</td>
                    </tr>
                    <tr>
                        <th> Details </th>
                    <td>{{$donationRequest->details}}</td>
                    </tr>
                    <tr>
                        <th> BloodType </th>
                    <td>{{$donationRequest->blood_type_id}}</td>
                    </tr>
                    <tr>
                        <th> City </th>
                    <td>{{$donationRequest->city_id}}</td>
                    </tr>
                    <tr>
                        <th> Client </th>
                    <td>{{$donationRequest->client_id}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection