@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit users</div>

                <div class="panel-body">
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>Edit Users</h3>

            </div>
            <div class="box-body">
                {{Form::open(['route'=>['usersFrontUpdate'],'method'=>'POST', 'files' => true])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-3 form-control-label">{!!  trans('backLang.fullName') !!}
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" value="{{$Users[0]->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-sm-3 form-control-label">{!!  trans('backLang.loginEmail') !!}
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" id="email" value="{{$Users[0]->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-sm-3 form-control-label">Password
                    </label>
                    <div class="col-sm-9">
                       <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>           
        

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t">{!! trans('backLang.update') !!}</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t">{!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
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
