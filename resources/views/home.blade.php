@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('governorate', 'App\Models\Governorate')

@section('page_title')
    Dashboard
@endsection

@section('content')
   <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Clients</span>
              <span class="info-box-number">{{$client->count()}}</span>
              </div>
              <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <div class="info-box-content">
                <span class="info-box-text">Governorates</span>
              <span class="info-box-number">{{$governorate->count()}}</span>
              </div>
              <span class="info-box-icon bg-danger"><i class="far fa-city"></i></span>

            </div>
        </div>
    </div>
    <!-- Default box -->
  

  </section>
  <!-- /.content -->

@endsection
