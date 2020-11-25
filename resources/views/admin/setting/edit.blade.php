@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-success ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edit Setting
        </div>

        <div class="card-body">
          <form action="{{route('admin.setting.update', $setting->id ?? '')}}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')
           
            <div class="form-group">
           <label for="notification_settings_text">Notifaction Setting Text</label>
            <input type="text" class="form-control" id="notification_settings_text" name="notification_settings_text" placeholder="notification_settings_text" value="{{$setting->notification_settings_text  ?? ''}}" >
              </div>

            <div class="form-group">
           <label for="about_app">about app</label>
            <input type="text" class="form-control" id="about_app" name="about_app" placeholder="about_app" value="{{$setting->about_app ?? ''}}" >
              </div>

            <div class="form-group">
           <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$setting->phone ?? ''}}" >
              </div>

            <div class="form-group">
           <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{$setting->email ?? ''}}" >
              </div>

            <div class="form-group">
           <label for="fb_link"> <i class="fab fa-twitter"></i></label>
            <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="fb_link" value="{{$setting->fb_link?? ''}}" >
              </div>

            <div class="form-group">
           <label for="tw_link"> <i class="fab fa-facebook"></i> </label>
            <input type="text" class="form-control" id="tw_link" name="tw_link" placeholder="tw_link" value="{{$setting->tw_link ?? ''}}" >
              </div>
            <div class="form-group">
           <label for="insta_link"> <i class="fab fa-instagram"></i></label>
            <input type="text" class="form-control" id="insta_link" name="insta_link" placeholder="insta_link" value="{{$setting->insta_link ?? ''}}" >
              </div>
            <div class="form-group">
           <label for="youtube_link"> <i class="fab fa-youtube"></i></label>
            <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="youtube_link" value="{{$setting->youtube_link ?? ''}}" >
              </div>

              <button type="submit" class="btn btn-primary"> Update </button>
            </form>
        </div>

    </div>
@endsection
