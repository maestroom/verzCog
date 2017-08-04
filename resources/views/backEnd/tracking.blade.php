@extends('backEnd.layout')
@section('headerInclude')
    <link href="{{ URL::to("backEnd/libs/jquery/bootstrap-daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <div class="padding">
        <div class="row m-b">
            <div class="col-sm-6 m-b-sm">
                <h3>Web Analysis and Tracking</h3>
            </div>
            <div class="col-sm-6 text-sm-right">
                <div class="btn-group m-l-xs m-t-1">
                    <div class="btn btn-sm primary">
                        <?php echo date('d M Y'); ?>
                    </div>
                </div>
            </div>

        </div>



        <div class="row m-b">

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 primary">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>233</a></h3>
                        <small class="text-muted">Visitors to site</small>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 warning">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>233</a></h3>
                        <small class="text-muted">Downlods</small>
                    </div>
                </div>
            </div>




            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 warn">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>233</a></h3>
                        <small class="text-muted">Registered event/training</small>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 b-warning">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>233</a></h3>
                        <small class="text-muted">Register for champions</small>
                    </div>
                </div>
            </div>


        </div>






        <div class="row m-b">


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 danger">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>233</a></h3>
                        <small class="text-muted">Started Quiz</small>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 dark">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>12</a></h3>
                        <small class="text-muted">Completed Quiz</small>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 blue">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>1244</a></h3>
                        <small class="text-muted">Account Signup</small>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 orange">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>87</a></h3>
                        <small class="text-muted">Giving.sg</small>
                    </div>
                </div>
            </div>


        </div>



        <div class="row m-b">


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 green">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>42</a></h3>
                        <small class="text-muted">Time Spent on site</small>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 yellow">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>98</a></h3>
                        <small class="text-muted">Time spent on quiz</small>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 pink">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>212</a></h3>
                        <small class="text-muted">Download each resource</small>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 brown">
                    <div class="pull-right m-l">
            <span class="w-56 dker text-center rounded">
              <i class="text-lg material-icons">&#xe7fb;</i>
            </span>
                    </div>
                    <div class="clear">
                        <h3 class="m-a-0 text-lg"><a href>898</a></h3>
                        <small class="text-muted">{{ trans('backLang.visitors') }}</small>
                    </div>
                </div>
            </div>


        </div>



        <div class="row">
            <div class="box m-b-0">
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th class="text-center">Date</th>
                            <th>Visits</th>
                            <th class="text-center">Quiz Attempts</th>
                            <th class="text-center">Quiz Completed</th>
                            <th>Champion</th>
                            <th>Registration</th>
                            <th>Givings Clicks</th>
                            <th>Time Web</th>
                            <th>Time Quiz</th>
                        </tr>
                        </thead>

                        <?php
                            for ($i=1;$i<10;$i++) {?>
                        <tbody>

                        <td>13 April 2017</td>
                        <td>120</td>
                        <td>15</td>
                        <td>98</td>
                        <td>28</td>
                        <td>198</td>
                        <td>238</td>
                        <td>2 min</td>
                        <td>4 hrs 10min</td>
                        <td></td>

                        </tbody>

                        <?php }?>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('footerInclude')
    <script src="{{ URL::to("backEnd/libs/jquery/bootstrap-daterangepicker/moment.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ URL::to("backEnd/libs/jquery/bootstrap-daterangepicker/daterangepicker.js") }}"
            type="text/javascript"></script>
    <script type="text/javascript">
        var Index = function () {
            return {
                initDashboardDaterange: function () {
                }
            };

        }();
        jQuery(document).ready(function () {
            Index.initDashboardDaterange();
        });
    </script>
@endsection
