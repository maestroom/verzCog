@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>Resource Topic</h3>

            </div>

            @if($RTPs->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            @if(@Auth::user()->permissionsGroup->add_status)
                                @foreach($WebmasterBanners as $WebmasterBanner)
                                    <a class="btn btn-fw primary marginBottom5"
                                       href="{{route("BannersCreate",$WebmasterBanner->id)}}">
                                        <i class="material-icons">&#xe02e;</i>
                                        &nbsp; {!! trans('backLang.'.$WebmasterBanner->name) !!}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if($RTPs->total() > 0)

                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $title_var = "title_" . trans('backLang.boxCode');
                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                        $i=1;
                        ?>
                        @foreach($RTPs as $RTP)
                            <?php
                            if ($RTP->$title_var != "") {
                                $title = $RTP->$title_var;
                            } else {
                                $title = $RTP->$title_var2;
                            }
                            ?>
                            <tr>

                                <td>
                                    {{$i++}}


                                </td>

                                <td class="text-left">
                                    How to give
                                </td>


                                <td>22 April 2017</td>
                                <td>23 April 2017</td>
                                <td class="text-left">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <a class="btn btn-sm success"
                                           href="#">
                                            <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                            </small>
                                        </a>
                                    @endif
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <button class="btn btn-sm warning" >
                                            <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                            </small>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="m-{{ $RTP->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                                <br>
                                                <strong>[ {{ $title }} ]</strong>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <a href="{{ route("BannersDestroy",["id"=>$RTP->id]) }}"
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

                        <div class="row" style="padding-left:20px;">
                        <div class="col-sm-6 text-left">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $RTPs->firstItem() }}
                                -{{ $RTPs->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $RTPs->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $RTPs->links() !!}
                        </div>
                        </div>

                    </div>
                </footer>



            @endif
        </div>
    </div>
@endsection
@section('footerInclude')

@endsection
