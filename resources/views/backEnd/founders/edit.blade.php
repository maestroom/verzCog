@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>create founders</h3>
                <small>
                    <a href="{{ route('founders') }}">Funding member Management</a> /
                    <a href="#">Edit Funding member</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("founders")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['foundersUpdate',$Founders[0]->id],'method'=>'POST', 'files' => true])}}


                <div class="form-group">
                    <label>Company Name:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{!! $Founders[0]->name !!}" >
                </div>

                <div class="form-group">
                    <label>Company Link:</label>
                    <input type="text" class="form-control" name="company_link" id="company_link" value="{!! $Founders[0]->company_link !!}" >
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> Update</button>
                        <a href="{{route("founders")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section('footerInclude')





@endsection