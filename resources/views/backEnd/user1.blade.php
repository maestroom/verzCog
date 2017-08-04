@extends('backEnd.layout')
@section('content')
@include('backEnd.users.permissions.view')


    <div class="padding">
        <div class="box">


            <div class="box-header dker">

            <?php if(!empty($Users)){?>


                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-fw primary" href="{{route("visitorsSubscribed")}}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; Subscribed Users
                            </a>
                        </div>
                        @if($CheckLayoutPermission[0]->delete===1)
                            <div class="col-md-4">
                                <div class="btn btn-fw primary" id="remove_selected">Delete Selected Users</div>
                            </div>
                        @endif
                        @if($CheckLayoutPermission[0]->create===1)
                            <div class="col-md-4">
                                <a class="btn btn-fw primary" href="{{route("usersCreate")}}">
                                    <i class="material-icons">&#xe7fe;</i>
                                    &nbsp; {{ trans('backLang.newUser') }}
                                </a>
                            
                            </div>
                        @endif
                    </div>
                </div>

            <?php }?>


            </div>

           <?php if(empty($Users)){?>
           @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}f
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
            <?php }?>

            <?php if(!empty($Users)){?>
                {{Form::open(['route'=>'usersStoreCsr','method'=>'post'])}}

                <div class="table-responsive">

                <table id="example1" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="display:none;">Ids</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>Subscribed</th>
                            <th>Role Name</th>
                            <th>Involved in CSR</th>
                            <th>Status</th>
                            <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Users as $User)
                            <tr id="{{$User->id}}">
                                <td style="display:none;">
                                    {!! $User->id !!}
                                </td>
                    
                                <td>
                                    {!! $User->name   !!}
                                </td>

                                <td>
                                    <small>{!! $User->email   !!}</small>
                                </td>
                                <td>
                                    <small>{{$User->company_name}}</small>
                                </td>

                                <td>
                                    <small>
                                     @if($User->subscribed==1)
                                        <span class="nav-icon glyphicon glyphicon-ok"></span>
                                    @else
                                        <span class="nav-icon glyphicon glyphicon-remove"></span>
                                    @endif 

                                    </small>
                                </td>

                                <td>
                                    <small>{{$User->name1}}</small>
                                </td>
                                <td>
                                    

                                    <input type="radio" @if($User->csr==1) checked @endif name="csr[{{$User->id}}][]" value="1">Yes
                                    <input type="radio" @if($User->csr==0) checked @endif name="csr[{{$User->id}}][]" value="0">No


                                </td>
                                 <td>
                                    @if($User->status==1)
                                        <span class="nav-icon glyphicon glyphicon-ok"></span>
                                    @else
                                        <span class="nav-icon glyphicon glyphicon-remove"></span>
                                    @endif 
                                </td>
                                <td class="text-center">


                                    @if($CheckLayoutPermission[0]->edit===1)
                                    <a class="btn btn-sm success"
                                       href="{{ route("usersEdit",["id"=>$User->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>
                                    @endif
                                  
                                    @if($CheckLayoutPermission[0]->delete===1)
                                    <a class="btn btn-sm warning"
                                       href="{{ route("usersDestroy",["id"=>$User->id]) }}">
                                       <small><span class="glyphicon glyphicon-trash"></span>
                                            </small>
                                    </a>
                                    @endif


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


<button type="submit" class="btn danger p-x-md pull-right">Update Csr</button>



                </div>
                {{Form::close()}}
            <?php }?>
        </div>
    </div>
@endsection
@section('footerInclude')

    <script type="text/javascript">
    $(document).ready(function(){
    var all_ids = [];
    var table = $('#example1').DataTable({
        dom: 'Bfrtip',
        select: true,
        buttons: [
            'excel',
             {
                text: 'Select All',
                action: function () {
                    table.rows().select();

                }
            },
            {
                text: 'Select none',
                action: function () {
                    table.rows().deselect();
                }
            }
        ],

        select: {
            style: 'multi'
        }
    });





    table.on( 'select', function ( e, dt, type, indexes ) {
            console.log(this);
            var rowData = table.rows( indexes ).data().toArray();
            $.each( rowData, function( index, value ){
                console.log(dt);

                if($.inArray(value[0], all_ids) === -1) {
                    all_ids.push(value[0]);
                }

            });
        })
        .on( 'deselect', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
            $.each( rowData, function( index, value ){
                 all_ids.splice( $.inArray(value[0], all_ids), 1 );

            });
        });


$("#remove_selected").click(function(){

    console.log(all_ids);



    $.ajax({
        type: "POST",
        cache: false,
        encoding: "UTF-8",
        url: "{{ url('admin/users/deleteall') }}",
        data: {Ids: all_ids,"_token": "{{ csrf_token() }}"},
        success: function (data) {

                location.reload(true);

        }
    });
    return false;


})


    
    })
       
    </script>

@endsection

