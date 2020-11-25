@extends('layouts.app')
@section('content')

@if (session('status'))
<div class="alert alert-default-success">
    {{ session('status') }}
</div>
@endif

    <div class="card">
        <div class="card-body">
          <div class="table-responsive">
              <table class=" table table-bordered table-striped table-hover datatable">
                    
                <tbody>
                  @foreach ($settings as $setting)
                    
                      <a class="btn  btn-danger mb-2" href="{{route('admin.setting.edit' , $setting->id ?? '')}}"> Edit Setting </a>
                
                      <tr>
                            <th>  <h5><b>Notifaction Setting Text</b> </h5>    </th>
                            <td> <p>{{$setting->notification_settings_text}} </p></td>
                      </tr>
                      <tr>
                            <th>  <h5><b>about app</b> </h5>    </th>
                            <td> <p>{{$setting->about_app}} </p></td>
                      </tr>
                      <tr>
                          <th>  <h5><b>Phone</b> </h5>    </th>
                          <td> <h6>{{$setting->phone}}</h6></td>
                    </tr>
                      <tr>
                          <th>  <h5><b>Email</b> </h5>    </th>
                          <td> <a href="#">{{$setting->email}}</a></td>
                    </tr>
                      <tr>
                          <th>   <i class="fab fa-twitter"></i>   </th>
                          <td> <a href="#">{{$setting->tw_link}}</a></td>
                    </tr>
                      <tr>
                          <th>  <i class="fab fa-facebook"></i>    </th>
                          <td> <a href="#">{{$setting->fb_link}}</a></td>
                    </tr>
                      <tr>
                          <th> <i class="fab fa-instagram"></i>   </th>
                          <td> <a href="#">{{$setting->insta_link}}</a></td>
                    </tr>
                      <tr>
                          <th>  <i class="fab fa-youtube"></i>   </th>
                          <td> <a href="#">{{$setting->youtube_link}}</a></td>
                    </tr>
                  
                    @endforeach  

                  </tbody>
  

              </table>
              </div>
            </div>
            
  </div>


@endsection
