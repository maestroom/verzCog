@extends('backEnd.layout')

@section('content')

    <div class="padding">
             <h3>Events</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                </small>
        <div class="box">

            <div class="box-header dker">
                @if($CheckLayoutPermission[0]->create===1)
                <a class="btn btn-fw primary" href="{{route("eventsCreateTopic")}}">
                            &nbsp; New Event Topic
                </a>
                @endif
                <a class="btn btn-fw primary" href="{{route("eventsAllTopic")}}">
                            &nbsp; All Topics
                </a>
            </div>

                @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("eventsCreate")}}">
                            &nbsp; New Event
                        </a>
                    </div>
                </div>
                @endif

            <?php if(!empty($Events)){?>
                <div class="table-responsive">
                    

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Event Title</th>
                            <th>Photos</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Events as $events)
                            <tr>
                               
                              
                                <td>
                                    {!! $events->start_date   !!}
                                </td>

                                <td>
                                    <small>{!! $events->title   !!}</small>
                                </td>
                                <td>
                                    <small><?php echo count(unserialize($events->images_array));?></small>
                                </td>
                                <td>
                                    <small>
                                     @if($events->status==1)
                                        <span class="nav-icon glyphicon glyphicon-ok"></span>
                                    @else
                                        <span class="nav-icon glyphicon glyphicon-remove"></span>
                                    @endif 

                                    </small>
                                </td>
                                 <td>
                                    <small>{!! $events->created_at   !!}</small>
                                </td>
                                   <td>
                                    <small>{!! $events->updated_at   !!}</small>
                                </td>
                                <td class="text-center">

                                @if($CheckLayoutPermission[0]->edit===1)
                                    <a class="btn btn-sm success"
                                       href="{{ route("eventsEdit",["id"=>$events->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>
                                @endif  
                                @if($CheckLayoutPermission[0]->delete===1)
                                    <a class="btn btn-sm warning"
                                       href="{{ route("eventsDestroy",["id"=>$events->id]) }}">
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
