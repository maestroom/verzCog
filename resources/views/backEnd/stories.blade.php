@extends('backEnd.layout')

@section('content')

    <div class="padding">
             <h3>Stories</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
        <div class="box">


        <div class="box-header dker">

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-fw primary" href="{{route("storiesUsers")}}">
                            &nbsp; Users Stories
                            </a>
                        </div>
                            <div class="col-md-4">
                                <a class="btn btn-fw primary" href="{{route("storiesAllTopic")}}">
                                &nbsp; Story Categories
                                </a>
                            </div>
                            @if($CheckLayoutPermission[0]->create===1)
                            <div class="col-md-4">
                                <a class="btn btn-fw primary" href="{{route("storiesCreate")}}">
                                    <i class="material-icons"></i>
                                    &nbsp; New Story
                                </a>
                            
                            </div>
                            @endif
                    </div>
                </div>
            </div>

                       <?php if(!empty($Stories)){?>
                <div class="table-responsive">
                    

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Story Name</th>
                            <th>Story By</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Stories as $story)
                            <tr>
                                <td>
                                    <small>{!! $story->title   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $story->user_name   !!}</small>
                                </td>
                                 <td>
                                    <small>{!! $story->created_at   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $story->updated_at   !!}</small>
                                </td>
                                <td class="text-center">
                                 @if($CheckLayoutPermission[0]->edit===1)
                                    <a class="btn btn-sm success"
                                       href="{{ route("storiesEdit",["id"=>$story->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>
                                    @endif
                                     @if($CheckLayoutPermission[0]->delete===1)


                                    <a class="btn btn-sm warning"
                                       href="{{ route("storiesDestroy",["id"=>$story->id]) }}">
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
