@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe03b;</i> {{ trans('backLang.newPermissions') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                     /
                    <a href="">{{ trans('backLang.usersPermissions') }}</a>
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
                {{Form::open(['route'=>['permissionsUpdate',$id],'method'=>'POST'])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.title') !!}
                    </label>
                    <div class="col-sm-10">

                        <input type="text" class='form-control' name="name" value="{{$role_array[0]->role_name}}">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="analytics_status"
                           class="col-sm-2 form-control-label">Modules
                    </label>
                    <div class="col-sm-4">
                    @foreach($Modules as $modules)
                        <table class="table row border">
                          <thead>
                            <tr class="col-sm-12">
                              <th class="col-sm-12" style="border:0;">{{$modules->name}}</th>
                              <td>View 
                                <tr>
                                <td>
                                @foreach($role_array as $rolearray)
                                @if($modules->id==$rolearray->module_id)
                                    <input type="radio" name="module[{{$modules->id}}]['view'][]" @if($rolearray->view==1) checked @endif value="1">Yes
                                    <input type="radio" name="module[{{$modules->id}}]['view'][]" @if($rolearray->view==0) checked @endif value="0">No
                                
                                @endif
                                @endforeach
                                </td>
                                </tr>
                              </td>
                              <td>Create
                             <tr>
                                <td>@foreach($role_array as $rolearray) @if($modules->id==$rolearray->module_id)
                                    <input type="radio" name="module[{{$modules->id}}]['create'][]" @if($rolearray->create==1) checked @endif value="1">Yes
                                    <input type="radio" name="module[{{$modules->id}}]['create'][]" @if($rolearray->create==0) checked @endif value="0">No
                                @endif @endforeach
                                </td>
                                </tr>
                              </td>
                              <td>Edit 
                               <tr>
                                <td>@foreach($role_array as $rolearray) @if($modules->id==$rolearray->module_id)
                                    <input type="radio" name="module[{{$modules->id}}]['edit'][]" @if($rolearray->edit==1) checked @endif value="1">Yes
                                    <input type="radio" name="module[{{$modules->id}}]['edit'][]" @if($rolearray->edit==0) checked @endif value="0">No
                                @endif @endforeach
                                </td>
                                </tr>
                              </td>
                              <td>Delete 
                               <tr>
                                <td>@foreach($role_array as $rolearray) @if($modules->id==$rolearray->module_id)
                                    <input type="radio" name="module[{{$modules->id}}]['delete'][]" @if($rolearray->delete==1) checked @endif value="1" checked>Yes
                                    <input type="radio" name="module[{{$modules->id}}]['delete'][]" @if($rolearray->delete==0) checked @endif value="0">No
                                @endif @endforeach
                                </td>
                                </tr>
                              </td>
                              
                            </tr>
                          </thead>
                        </table>
                    @endforeach
                    </div>
                </div>




<!--
                <div class="form-group row">
                    <label for="view_status1"
                           class="col-sm-2 form-control-label">View Permission</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="view_status" value="1">
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="view_status" value="0">
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>


                 <div class="form-group row">
                    <label for="add_status1"
                           class="col-sm-2 form-control-label">Create Permission</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="create_status" value="1">
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="create_status" value="0">
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.editPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="edit_status" value="1">
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="edit_status" value="0">
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="delete_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.deletePermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="delete_status" value="1">
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                <input type="radio" name="delete_status" value="0">
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
 -->
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
