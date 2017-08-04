@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.editUser') }}</h3>
                <small>
                    <a href="{{ route('users') }}">{{ trans('backLang.usersPermissions') }}</a> /
                    <a href="#">Edit Users</a>
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
                {{Form::open(['route'=>['usersUpdate',$Users[0]->id],'method'=>'POST', 'files' => true])}}

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
                <input type="hidden" name="company_id" id="company_id" value="{{$Users[0]->company}}">

                <div class="form-group row">
                    <label for="permissions1"
                           class="col-sm-3 form-control-label">RoleName</label>
                    <div class="col-sm-9">
                        <select name="rolename" id="rolename" required class="form-control">
                            @foreach ($RoleNames as $rolenames)
                                <option @if($rolenames->id==$Users[0]->role_type_id) selected=selected @endif  value="{{ $rolenames->id  }}">{{ $rolenames->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="quiz_rep"
                           class="col-sm-3 form-control-label">Quiz Rep</label>
                    <div class="col-sm-9">
                        <select name="quiz_rep" id="quiz_rep" required class="form-control">
                            @foreach ($Users_Csr as $users_csr)

                                <option @if($users_csr->id==$UserCsrId) selected=selected @endif  value="{{ $users_csr->id  }}">{{ $users_csr->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-3 form-control-label">{!!  trans('backLang.status') !!}</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',($Users[0]->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',($Users[0]->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.notActive') }}
                            </label>
                        </div>
                    </div>
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
