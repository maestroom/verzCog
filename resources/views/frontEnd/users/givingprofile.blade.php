@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Giving Profile</div>
                    <div class="panel-body">
                        <div class="padding">
                            <div class="box">
                                <div class="box-body">
                                    {{Form::open(['route'=>['GetgivingProfile'],'method'=>'POST', 'files' => true])}}

                                    


                                    <div class="form-group">
                                    <label>Select Year:</label>
                                        <select name="id" class="form-control">
                                        @foreach($givingProfile as $k => $v)
                                            <option @if($GetgivingProfile[0]->id==$v->id) selected=selected @endif value="{{$v->id}}">{{$v->year}}</option>
                                        @endforeach
                                        </select>
                                    </div>




                                    <div class="form-group row m-t-md">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary m-t">{!! trans('backLang.update') !!}</button>
                                            <a href="{{route("users")}}"
                                               class="btn btn-default m-t">{!! trans('backLang.cancel') !!}</a>
                                        </div>
                                    </div>

                                    {{Form::close()}}

                                    @if(!empty($GetgivingProfile))
                                        {{$GetgivingProfile}}
                                    @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerInclude')


<script type="text/javascript">
    $(document).ready(function(){

        $('.start_datetime , .end_datetime').datetimepicker({
        //language:  'fr',
        format: "yyyy-mm-dd HH:ii:ss",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        minuteStep: 10
        });

    })
</script>
@endsection









