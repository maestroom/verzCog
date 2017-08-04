
@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> Edit Emailtemplates</h3>
                <small>
                    <a href="{{ route('users') }}">Emailtemplates Management</a> /
                    <a href="#">Edit Emailtemplates</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("users")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['emailtemplatesUpdate',$Emailtemplate[0]->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-3 form-control-label">Emailtemplates Name
                    </label>
                    <div class="col-sm-9">
                        {!! Form::text('name',$Emailtemplate[0]->name, array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>

                 <div class="form-group">
                  <label for="contents">Contents:</label>
                  <textarea class="form-control" rows="5" id="contents" name="contents">
                      {{$Emailtemplate[0]->contents}}
                  </textarea>
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.update') !!}</button>
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
