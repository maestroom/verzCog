@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> {{ trans('backLang.newUser') }}</h3>
                <small>
                    <a href="{{ route('users') }}">{{ trans('backLang.usersPermissions') }}</a> / 
                    <a href="">create users</a>
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
                {{Form::open(['route'=>['usersStore'],'method'=>'POST', 'files' => true ])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">Name
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('name','', array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-sm-2 form-control-label">Email Address
                    </label>
                    <div class="col-sm-10">
                        {!! Form::email('email','', array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-sm-2 form-control-label">Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-sm-2 form-control-label">Confirm Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">Select Company
                    </label>
                    <div class="col-sm-10">

                        <select name="company" id="company" class="form-control c-select">

                            @foreach($Companies as $Company)
                                <option value="{{ $Company->id  }}">{{ $Company->name }}</option>
                            @endforeach
                          </select>

                    </div>
                </div>




                <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.status') !!}</label>
                    <div class="col-sm-6">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',true, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.notActive') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions1"
                           class="col-sm-2 form-control-label">RoleName</label>
                    <div class="col-sm-10">
                        <select name="rolename" id="rolename" required class="form-control c-select">
                            <option value="">- - {!!  trans('backLang.selectPermissionsType') !!} - -</option>
                            @foreach ($RoleNames as $rolenames)
                                <option value="{{ $rolenames->id  }}">{{ $rolenames->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.add') !!}</button>
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
