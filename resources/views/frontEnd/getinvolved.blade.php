@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Get Involved</div>
                    <div class="panel-body">
                        <div class="padding">
                            <div class="box">
                                <div class="box-body">

                                <a href="{{route("getinvolvedCreatefront")}}"
                           class="btn btn-default m-t">Get Involved Create</a>

                           <br>                           <br>


                                @foreach($Getinvolved as $getinvolved)
                                    <div class="form-group row">
                                    <div class="col-sm-1">

                                    <img height="100px" width="100px" src="{{ asset('uploads/getinvolved/logo/'.$getinvolved->company_logo) }}">
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="title" class="col-sm-3 form-control-label">{{$getinvolved->title}} </label>
                                    </div>
                                    </div>
                                @endforeach



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


        var maxChars = $("#message");
        var max_length = maxChars.attr('maxlength');
        if (max_length > 0) {
            maxChars.bind('keyup', function(e){
                length = new Number(maxChars.val().length);
                counter = max_length-length;
                $("#messageNum_counter").text(counter);
            });
        }



    })
</script>
@endsection









