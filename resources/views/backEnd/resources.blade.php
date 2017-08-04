@extends('backEnd.layout')

@section('content')

    <div class="padding">
             <h3>Resource Library</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
        <div class="box">

            <div class="box-header dker">
                <a class="btn btn-fw primary" href="{{route("resourcesAllTopic")}}">
                            &nbsp; Resource Topic
                </a>
            </div>
                @if($CheckLayoutPermission[0]->create===1)
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("resourcesCreate")}}">
                            &nbsp; New Resource
                        </a>
                    </div>
                </div>
                @endif

                       <?php if(!empty($Resources)){?>
                <div class="table-responsive">
                    

            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Resource Name<br><small><i><b>One Liner</b></i></small></th>
                            <th>Category</th>
                            <th>Pdf File Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Resources as $resource)
                            <tr>

                                <td>
                                    <small>{!! $resource->title   !!}</small>
                                    <br><small><i>{!! $resource->one_liner !!}</i></small>
                                </td>
                                <td>
                                    <small>
                                    @if($resource->type==1)
                                        NVPC Publication
                                    @endif
                                    @if($resource->type==2)
                                        Guides & Tools
                                    @endif
                                    @if($resource->type==0)
                                        Case Studies 
                                    @endif  

                                    </small>
                                </td>

                                <td>
                                    


                                    <mark><a href="{{ route("resourcesDownload",["file_path"=>"pdf","file_name"=>$resource->pdf_name]) }}">
                                       <small>{!! $resource->pdf_name  !!}</small>
                                    </a></mark>


                                </td>
                                 <td>
                                    <small>{!! $resource->created_at   !!}</small>
                                </td>
                                   <td>
                                    <small>{!! $resource->updated_at   !!}</small>
                                </td>
                                <td class="text-center">
                                    @if($CheckLayoutPermission[0]->edit===1)
                                    <a class="btn btn-sm success"
                                       href="{{ route("resourcesEdit",["id"=>$resource->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>
                                    @endif
                                    @if($CheckLayoutPermission[0]->delete===1)
                                    <a class="btn btn-sm warning"
                                       href="{{ route("resourcesDestroy",["id"=>$resource->id]) }}">
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
