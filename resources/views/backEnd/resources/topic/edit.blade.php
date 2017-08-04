

@extends('backEnd.layout')

@section('content')

    <div class="padding">
             <h3>Topics</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
        <div class="box">

            <div class="box-header dker">
                <a class="btn btn-fw primary" href="{{route("resourcesCreateTopic")}}">
                            &nbsp; New Resources Topic
                </a>
                <a class="btn btn-fw primary" href="{{route("resourcesAllTopic")}}">
                            &nbsp; All Topics
                </a>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['resourcesUpdateTopic',$Resources_Topic[0]->id],'method'=>'POST', 'files' => true])}}


                <div class="form-group">
                    <label>Topic Name:</label>
                    <input type="text" class="form-control" value="{{$Resources_Topic[0]->title}}" name="title" id="title">
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> Create</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
