@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h2>Live Feed Management</h2>

            </div>

            @if($liveFeed->total() == 0)
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

            @if($liveFeed->total() > 0)

                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Num</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Highlighted</th>
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
                        @foreach($liveFeed as $lF)
                            <?php

                            if ($lF->$title_var != "") {
                                $title = $lF->$title_var;
                            } else {
                                $title = $lF->$title_var2;
                            }
                            ?>
                            <tr>

                                <td>
                                    {{$i++}}


                                </td>

                                <td>7</td>

                                <td class="text-left">
                                    Become a COG
                                </td>


                                <td>Help drive the movement</td>
                                <td>/resources.pdf</td>
                                <td>Active</td>
                                <td>Yes</td>
                                <td>21 April 2017</td>
                                <td>21 April 2017</td>
                                <td class="text-left">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <a class="btn btn-sm success"
                                           href="#">
                                            <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                            </small>
                                        </a>
                                    @endif
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <button class="btn btn-sm warning">
                                            <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                            </small>
                                        </button>
                                    @endif

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
                <footer class="dker p-a">


                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $liveFeed->firstItem() }}
                                -{{ $liveFeed->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $liveFeed->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-10 text-right text-center-xs">
                            {!! $liveFeed->links() !!}
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
