@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Visitors Subscribed</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small>
            </div>


            <?php if(!empty($Subscription)){?>
                <div class="table-responsive">

                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Subscribed Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Subscription as $Subscription)
                            <tr>
                               

                                <td>
                                    <small>{!! $Subscription->email   !!}</small>
                                </td>
                                <td>
                                    <small>{{$Subscription->created_at}}</small>
                                </td>
                            </tr>
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

            //$('#example, #example1').DataTable();


    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    });

    $(".dataTables_filter,.dt-buttons,.dataTables_info,.dataTables_paginate").css("padding","10px");
    

    })
       
    </script>
@endsection
