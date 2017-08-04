@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dash Board</div>

                <div class="panel-body">
    <div class="padding">
        <div class="box">

            <div class="box-body">



<a href="{{route("usersFrontEdit")}}"
                           class="btn btn-default m-t">Edit User</a>
                        <a href="{{route("usersFrontDestroy")}}"
                           class="btn btn-default m-t">Delete User</a>


            
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerInclude')


@endsection
