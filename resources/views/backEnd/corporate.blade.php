

@extends('backEnd.layout')

@section('content')

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Corporate Giver</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                </small>
            </div>
            <?php if(!empty($Corporate)){?>
                <div class="row p-a pull-right" style="margin-top: -70px;">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{route("corporateCreate")}}">
                            &nbsp; Create Corporate
                        </a>
                    </div>
                </div>
            <?php }?>
           <?php if(empty($Corporate)){?>
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}f
                            <br>
                            <br>
                            <a class="btn btn-fw primary" href="{{route("Corporatecreate")}}">
                                <i class="material-icons">&#xe7fe;</i>
                                &nbsp; Create Corporate
                            </a>

                        </div>
                    </div>
                </div>
            <?php }?>

            <?php if(!empty($Corporate)){?>
                <div class="table-responsive">
                    

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Corporate as $corporate)
                            <tr>
                               
                              
                                <td>
                                    {!! $corporate->name   !!}
                                </td>
                                 <td>
                                    <small>{!! $corporate->created_at   !!}</small>
                                </td>
                                 <td>
                                    <small>{!! $corporate->updated_at   !!}</small>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm success"
                                       href="{{ route("corporateEdit",["id"=>$corporate->id]) }}">
                                        <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                    </a>


                                    <a class="btn btn-sm warning"
                                       href="{{ route("corporateDestroy",["id"=>$corporate->id]) }}">
                                       <small><span class="glyphicon glyphicon-trash"></span>
                                            </small>
                                    </a>

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
                {{Form::close()}}
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
