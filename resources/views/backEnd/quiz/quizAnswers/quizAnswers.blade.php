@extends('backEnd.layout')
@section('content')

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Quiz Answer Management</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
            </div>
            <?php if(!empty($QuizAnswers)){?>
            @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{ route("quizAnswersCreate",["quiz_id"=>$quiz_id,"id"=>$id]) }}">

                        

                            &nbsp; New Answer
                        </a>
                    </div>
                </div>
                @endif
            <?php }?>
           <?php if(empty($QuizAnswers)){?>
           @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            <a class="btn btn-fw primary" href="{{ route("quizAnswersCreate",["quiz_id"=>$quiz_id,"id"=>$id]) }}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; New Answer
                            </a>

                        </div>
                    </div>
                </div>
                @endif
            <?php }?>

            <?php if(!empty($QuizAnswers)){?>
                <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Is Others</th>
                            <th>Is None</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($QuizAnswers as $quizanswers)
                            <tr>
                              
                                <td>
                                    {!! $quizanswers->id  !!}
                                </td>

                                <td>
                                    <small>{!! $quizanswers->title   !!}</small>
                                </td>
                                <td>
                                    <small>
                                        @if ($quizanswers->answer_cat==0)
                                            Investment
                                        @elseif ($quizanswers->answer_cat==1)
                                            Integration
                                        @elseif ($quizanswers->answer_cat==2)
                                            Institutionalisation
                                        @elseif ($quizanswers->answer_cat==3)  
                                            Impact
                                        @endif
                                    </small>
                                </td>
                                 <td>
                                    <small>
                                        @if ($quizanswers->is_others==0) 
                                             <span class="glyphicon-class glyphicon glyphicon-remove"></span> 
                                        @else  
                                            <span class="glyphicon-class glyphicon glyphicon-ok"></span>
                                        @endif
                                       
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        @if ($quizanswers->is_none==0) 
                                             <span class="glyphicon-class glyphicon glyphicon-remove"></span> 
                                        @else  
                                            <span class="glyphicon-class glyphicon glyphicon-ok"></span>
                                        @endif
                                       
                                    </small>
                                </td>
                                 <td>
                                    <small>{!! $quizanswers->created_at   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $quizanswers->updated_at   !!}</small>
                                </td>

                                <td class="text-center">
                                @if($CheckLayoutPermission[0]->edit===1)
                                  


                                    <a class="btn btn-sm success"
                                       href="{{ route("quizAnswersEdit",["question_id"=>$quizanswers->quiz_question_id,"id"=>$quizanswers->id]) }}">
                                           <small><span class="glyphicon glyphicon-pencil"></span>
                                        </small>
                                    </a>
                                    @endif
                                    @if($CheckLayoutPermission[0]->delete===1)


                                    <a class="btn btn-sm warning"
                                       href="{{ route("quizAnswersDestroy",["id"=>$quizanswers->id]) }}">
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

            $('#example').DataTable();

    })
       
    </script>
    <script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
</script>
@endsection
