@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Create founders</h3>
                <small>
                    <a href="{{ route('founders') }}">Partners Management</a> /
                    <a href="#">Edit Partner</a>
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
                {{Form::open(['route'=>['foundersStore'],'method'=>'POST', 'files' => true])}}


                <div class="form-group">
                    <label>Funding Member Name:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>


                <div class="form-group">
                    <label>Company Link:</label>
                    <input type="text" class="form-control" name="company_link" id="company_link">
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
@section('footerInclude')




@endsection