@extends('layouts.app')
@section('content')
    
<div class="card">
    <div class="card-header">
        Show Category
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <tbody>
                    <tr>
                        <th> name </th>
                    <td>{{$category->name}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection