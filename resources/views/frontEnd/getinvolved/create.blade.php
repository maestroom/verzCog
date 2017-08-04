@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Get Involved</div>
                    <div class="panel-body">
                        <div class="padding">
                            <div class="box">
                                <div class="box-body">
                                    {{Form::open(['route'=>['getinvolvedStorefront'],'method'=>'POST', 'files' => true])}}


                                    <div class="form-group row">
                                        <label for="title"
                                               class="col-sm-3 form-control-label">Topic
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" id="title" value="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="dtp_input1" class="control-label">Start date</label>
                                        <div class="input-group date form_datetime start_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" size="16" type="text" name="start_date" value="" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="dtp_input1" class="control-label">End date</label>
                                        <div class="input-group date form_datetime end_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" size="16" name="end_date" type="text" value="" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                    </div>   

                                    <div id="filediv"><label>Upload Company logo:</label><input name="company_logo" class="form-control company_logo_div" type="file" id="file"/></div><br/>
                                    <input type="button" id="add_more"  class="upload" value="Add More Files" style="display:none;"/>

                                    <input type="hidden" class="form-control" name="company_logo_photo" id="company_logo_photo">


                                    <div class="form-group">
                                      <label for="contents">Message:</label>
                                      <textarea class="form-control" rows="5" id="message" name="message"  maxlength="250"></textarea>
                                      Max Number of chars: <span id="messageNum_counter">250</span>

                                    </div>

                                    <div class="form-group row m-t-md">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary m-t">Submit</button>
                                        </div>
                                    </div>

                                    {{Form::close()}}
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


      $(document).on('change','.company_logo_div',function(){
        //console.log(this.value);
        console.log(this.value.replace('C:\\fakepath\\',""));
        $('#company_logo_photo').val(this.value.replace('C:\\fakepath\\',""));

      });


    })
</script>



@endsection








