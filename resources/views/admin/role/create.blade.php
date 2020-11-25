@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-default-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card">
 
        <div class="card-header">
            Create Role
        </div>

        <div class="card-body">
            <form action="{{route('admin.roles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name"  >
              </div>

              <div class="form_group">
                <label for="permission_list" >Permissions </label><br>
                <div class="row">
                    <div class="col-md-4">
                 <input id="selectAll" type="checkbox">
                <label for="selectAll" name="selectAll" > Select All</label>
                    </div>
                </div>
                <div class="row">
                    @foreach ($permissions as $permission)
                    <div class="col-sm-3">
                        <div class="checkbox">
                       <label>
                             <input type="checkbox"  name="permission_list[]"  value="{{$permission->id}}">
                        
                               {{$permission->name}} 
                            </label>

                        </div>
                    </div>
                        
                    @endforeach

                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
});

</script>
@endpush
