@extends('backEnd.layout')

@section('content')
    @include('backEnd.users.permissions.view')

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>{{ trans('backLang.users') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
            </div>

            @if($Users->total() >0)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("usersCreate")}}">
                            <i class="material-icons">&#xe7fe;</i>
                            &nbsp; {{ trans('backLang.newUser') }}
                        </a>
                    </div>
                </div>
            @endif
            @if($Users->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            <a class="btn btn-fw primary" href="{{route("usersCreate")}}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; {{ trans('backLang.newUser') }}
                            </a>

                        </div>
                    </div>
                </div>
            @endif

            @if($Users->total() > 0)
                {{Form::open(['route'=>'usersUpdateAll','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            {{--<th style="width:20px;">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>--}}
                            <th>&nbsp;</th>
                            <th>{{ trans('backLang.fullName') }}</th>
                            <th>{{ trans('backLang.loginEmail') }}</th>
                            <th>User Type</th>
                            <th>{{ trans('backLang.Permission') }}</th>
                            <th class="text-center" style="width:50px;">{{ trans('backLang.status') }}</th>
                            <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Users as $User)
                            <tr>
                               {{-- <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $User->id }}"><i
                                                class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$User->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>--}}
                                <td>&nbsp;</td>
                                <td>
                                    {!! $User->name   !!}
                                </td>

                                <td>
                                    <small>{!! $User->email   !!}</small>
                                </td>
                                <td>
                                    @if ( $User->userType==0) User 
                                    @elseif ($User->userType==1) Admin
                                    @else ($User->userType==2) Super Admin
                                    @endif
                                </td>
                                <td>
                                    <small>{{$User->permissionsGroup->name}}</small>
                                </td>
                                <td class="text-center">
                                    <i class="fa {{ ($User->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm success"
                                       href="{{ route("usersEdit",["id"=>$User->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>

                                    <button class="btn btn-sm warning" data-toggle="modal"
                                            data-target="#m-{{ $User->id }}" ui-toggle-class="bounce"
                                            ui-target="#animate">
                                        <small><span class="glyphicon glyphicon-trash"></span>
                                            </small>
                                    </button>


                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="m-{{ $User->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                                <br>
                                                <strong>[ {{ $User->name }} ]</strong>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <a href="{{ route("usersDestroy",["id"=>$User->id]) }}"
                                               class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-12 hidden-xs">
                            <!-- .modal -->
                            <div id="m-all" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <button type="submit"
                                                    class="btn danger p-x-md">{{ trans('backLang.yes') }}</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->



                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-2 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Users->firstItem() }}
                                -{{ $Users->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $Users->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-10 text-right text-center-xs">
                            {!! $Users->links() !!}
                        </div>
                    </div>
                </footer>
                {{Form::close()}}

                <script type="text/javascript">
                    $("#checkAll").click(function () {
                        $('input:checkbox').not(this).prop('checked', this.checked);
                    });
                    $("#action").change(function () {
                        if (this.value == "delete") {
                            $("#submit_all").css("display", "none");
                            $("#submit_show_msg").css("display", "inline-block");
                        } else {
                            $("#submit_all").css("display", "inline-block");
                            $("#submit_show_msg").css("display", "none");
                        }
                    });
                </script>
            @endif
        </div>
    </div>
@endsection
@section('footerInclude')
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endsection
