

@extends('backEnd.layout')
@section('content')

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Faq Question Management</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
            </div>
            <?php if(!empty($FaqQuestions)){?>
            @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("faqQuestionsCreate",$id)}}">
                            &nbsp; New Question
                        </a>
                    </div>
                </div>
                @endif
            <?php }?>
           <?php if(empty($FaqQuestions)){?>
           @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            <a class="btn btn-fw primary" href="{{route("faqquestionsCreate,$id")}}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; New Questions
                            </a>

                        </div>
                    </div>
                </div>
                @endif
            <?php }?>

            <?php if(!empty($FaqQuestions)){?>
                <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th>Id</th>
                            <th>Question</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($FaqQuestions as $faqquestions)
                            <tr>
                              
                                <td>
                                    {!! $faqquestions->id   !!}
                                </td>

                                <td>
                                    <small>{!! $faqquestions->question   !!}</small>
                                </td>

                                 <td>
                                    <small>{!! $faqquestions->created_at   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $faqquestions->updated_at   !!}</small>
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-sm warning"
                                       href="{{ route("faqAnswers",["faq_id"=>$faqquestions->faq_id,"id"=>$faqquestions->id]) }}">
                                        <small><span class="glyphicon glyphicon-list"></span>
                                        </small>
                                    </a>

                                    <div style="height:1px;"></div>
                                    @if($CheckLayoutPermission[0]->edit===1)
                                    <a class="btn btn-sm success"
                                       href="{{ route("faqQuestionsEdit",["id"=>$faqquestions->id]) }}">
                                           <small><span class="glyphicon glyphicon-pencil"></span>
                                        </small>
                                    </a>
                                    @endif
                                    <div style="height:1px;"></div>
                                    @if($CheckLayoutPermission[0]->delete===1)

                                    <a class="btn btn-sm warning"
                                       href="{{ route("faqQuestionsDestroy",["id"=>$faqquestions->id]) }}">
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
