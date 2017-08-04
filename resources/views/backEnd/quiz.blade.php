

@extends('backEnd.layout')

@section('content')

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Quiz Management</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
            </div>
            @if($CheckLayoutPermission[0]->view===1)
                <div class="row p-a" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("quizresults")}}">
                            &nbsp; User quiz Results
                        </a>
                    </div>
                </div>
            @endif

            <?php if(!empty($Quiz)){?>
            @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("quizCreate")}}">
                            &nbsp; New Quiz
                        </a>
                    </div>
                </div>
            @endif
            <?php }?>
           <?php if(empty($Quiz)){?>
           @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            <a class="btn btn-fw primary" href="{{route("quizCreate")}}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; New Quiz
                            </a>

                        </div>
                    </div>
                </div>
                @endif
            <?php }?>

            <?php if(!empty($Quiz)){?>
                <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th>Year</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Quiz as $quiz)
                            <tr>
                              
                                <td>
                                    {!! $quiz->year   !!}
                                </td>

                                <td>
                                    <small>{!! $quiz->name   !!}</small>
                                </td>
                                <td>
                                    <small>

                                    @if ($quiz->type==0) Basic 
                                    @else  Advanced
                                    @endif

                                    </small>
                                </td>
                                 <td>
                                    <small>
                                        @if ($quiz->status==0) 
                                             <span class="glyphicon-class glyphicon glyphicon-remove"></span> 
                                        @else  
                                            <span class="glyphicon-class glyphicon glyphicon-ok"></span>
                                        @endif
                                       
                                    </small>
                                </td>
                                 <td>
                                    <small>{!! $quiz->created_at   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $quiz->updated_at   !!}</small>
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-sm warning"
                                       href="{{ route("quizQuestions",["id"=>$quiz->id]) }}">
                                        <small><span class="glyphicon glyphicon-list"></span>
                                        </small>
                                    </a>
                                    @if($CheckLayoutPermission[0]->edit===1)

                                    <div style="height:1px;"></div>
                                    <a class="btn btn-sm success"
                                       href="{{ route("quizEdit",["id"=>$quiz->id]) }}">
                                           <small><span class="glyphicon glyphicon-pencil"></span>
                                        </small>
                                    </a>
                                    @endif
                                    @if($CheckLayoutPermission[0]->delete===1)
                                    <div style="height:1px;"></div>

                                    <a class="btn btn-sm warning"
                                       href="{{ route("quizDestroy",["id"=>$quiz->id]) }}">
                                        <small><span class="glyphicon glyphicon-trash"></span>
                                        </small>
                                    </a>
                                    @endif

                                </td>
                            
                            </tr>
                            <!-- .modal -->

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


                </footer>
            <?php }?>
        </div>
    </div>
@endsection
@section('footerInclude')
    
    

    <script type="text/javascript">
    $(document).ready(function(){

                   $('#example').DataTable( {
          "columnDefs": [
            { "width": "25%", "targets": 6}, 
            { "width": "25%", "targets": 5},
            { "width": "25%", "targets": 4},
            { "width": "42%", "targets": 1},
            { "width": "5%", "targets": 2}

            
          ]
        });

    })
       
    </script>
    <script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
</script>
@endsection
