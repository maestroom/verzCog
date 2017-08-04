@extends('backEnd.layout')

@section('headerInclude')
    <link href="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.min.css") }}" rel="stylesheet">


@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Add New Event</h3>
                <small>
                    <a href="{{ route('events') }}">Event</a> /
                    <a href="">Add New Event</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("events")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">

{{Form::open(['route'=>['eventsStore'],'id'=>'bootstrapTagsInputForm', 'method'=>'POST', 'files' => true])}}
  <div class="form-group row">
   
    <div class="form-group col-md-12">
            <div class="form-group col-md-5">
                <label for="dtp_input1" class="control-label">Start date</label>
                <div class="input-group date form_datetime start_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="start_date" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>

            <div class="form-group col-md-5">
                <label for="dtp_input1" class="control-label">End date</label>
                <div class="input-group date form_datetime end_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" name="end_date" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
    </div>
  </div>
    <div class="form-group">
    <label>Event Title:</label>
    <input type="text" class="form-control" name="title" id="title">
  </div>

    <div class="form-group">
      <label for="contents">Contents:</label>
      <textarea class="form-control" rows="5" id="contents" name="contents"></textarea>
    </div>


<div class="form-group row">
<div id="filediv" class="col-md-2"><input name="file[]" class="form-control file_event_image" type="file" id="file"/></div>
<input type="button" id="add_more"  class="upload" value="Add More Files"/>
</div>


    <div class="form-group" id="featured_image_div" style="display:none;">
    <label>Select Featured image:</label>
        <select name="featured_image" class="form-control" id="featured_image">

        </select>
    </div>

    <div class="form-group">
    <label>Select Tag:</label>
        <select name="tags[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Tags as $k => $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="col-md-12" style="padding:0;">
        <div class="form-group col-md-5" style="padding:0;">
        <label>Event Type:</label>
            <select name="event_type" class="form-control">
                <option>Select Event Type</option>
                <option value="0">Public</option>
                <option value="1">Private</option>
                <option value="2">External</option>
            </select>
        </div>
        <div class="form-group col-md-5 security_code_div" style="display:none;">
        <label>Event Security Code:</label>
            <input type="text" class="form-control" name="security_code" id="security_code">
        </div>
<!--         <div class="form-group col-md-5 event_url_div" style="display:none;">
        <label>Public Event Url:</label>
            <input type="text" class="form-control" name="event_url" id="event_url">
        </div> -->
    </div>


    <div class="col-md-12" style="padding:0;">
        <div class="form-group col-md-5 charge_url" style="padding:0;display:none">
        <label>Chargeable Event:</label>
            <select name="chargeble" class="form-control">
                <option>Select Chargeable Type</option>
                <option value="0">free</option>
                <option value="1">Chargeable</option>
            </select>
        </div>

        <div class="form-group col-md-5 event_url_div" style="display:none;">
        <label>Event Url:</label>
            <input type="text" class="form-control" name="event_url" id="event_url">
        </div>
    </div>

    <div class="form-group">
    <label>Event Location:</label>
            <input type="text" class="form-control" name="event_location" id="event_location">
    </div>


    <div class="form-group">
    <label>Max Attendees:</label>
            <input type="text" class="form-control" name="max_attendees" id="max_attendees">
    </div>

    <div class="form-group">
    <label>Max Waiting List:</label>
            <input type="text" class="form-control" name="max_waiting_list" id="max_waiting_list">
    </div>


    <div class="form-group">
    <label>Select Topic:</label>
        <select name="Events_topic[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Events_topic as $k => $v)
            <option value="{{$v->id}}">{{$v->title}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Status:</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select>
    </div>


<div class="form-group">
    <div id="guestdiv">
        <label>1 Guest Speaker name:</label>
        <input type="text" class="form-control" name="guest[1][name]" id="guest_name">

        <div id="filediv"><label>1 Guest Speaker Photo:</label><input name="guest[1][photo]" class="form-control guest_photo_div" guest_photo_div="guest_photo_div1" type="file" id="file"/></div><br/>
            <input type="button" id="add_more"  class="upload" value="Add More Files" style="display:none;"/>

        <label>1 Guest Designation:</label>
                <input type="text" class="form-control" name="guest[1][designation]" id="guest_designation">
        <label for="contents">1 Guest Details:</label>
          <textarea class="form-control" rows="5" id="guest_details" name="guest[1][details]"></textarea>

        <input type="hidden" class="form-control" name="guest[1][photo_name]" id="guest_photo_div1">


    <div>
    <input type="button" id="add_more_guest"  class="uploadguest" value="Add More Guests"/>
</div>

<button type="submit" class="btn btn-default">Submit</button>

  {{Form::close()}}

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
    $("select[name='event_type']").change(function(){     
       if($(this).val()==0)
       {
            //$(".security_code_div").hide();
            //$(".event_url_div").show();
            $(".charge_url").show();
            $(".security_code_div").hide();

            
       }
       else if($(this).val()==1)
       {
           //$(".event_url_div").hide();
           $(".charge_url").show();
           $(".security_code_div").show();

       }
       else if($(this).val()==2)
       {
           $(".security_code_div").hide();
           $(".charge_url").hide();

       }
       else{
            $(".security_code_div").hide();
            //$(".event_url_div").hide();
       }
    }); 




    $(document).on('change',"select[name='chargeble']",function(){
        console.log("hi sd sndsjhdjs");

       if($(this).val()==1)
       {
            $(".event_url_div").show();
       }else{

            $("#event_url").val("");
            $(".event_url_div").hide();
       }

    });

    $('#selectpicker1,#selectpicker').select2();

    })


var added_count =1;

    $('#add_more_guest').click(function() {
        added_count += 1;
        $(this).before($("<div/>", {id: 'guestdiv'}).fadeIn('slow').append(

        '<label>'+added_count+' Guest Speaker name:</label><input type="text" class="form-control" name="guest['+added_count+'][name]" id="guest_name"><div id="filediv"><label>'+added_count+' Guest Speaker Photo:</label><input name="guest['+added_count+'][photo]" class="form-control guest_photo_div" guest_photo_div="guest_photo_div'+added_count+'" type="file" id="file"/></div><br/><input type="button" id="add_more"  class="upload" value="Add More Files" style="display:none;"/><label>'+added_count+' Guest Designation:</label><input type="text" class="form-control" name="guest['+added_count+'][designation]" id="guest_designation"><label for="contents">'+added_count+' Guest Details:</label><textarea class="form-control" rows="5" id="guest_details" name="guest['+added_count+'][details]"></textarea><input type="hidden" class="form-control" name="guest['+added_count+'][photo_name]" id="guest_photo_div'+added_count+'">'
            ));


    });



 $(document).on('change','.file_event_image',function(){
    //console.log(this.value);
    console.log(this.value.replace('C:\\fakepath\\',""));
    var image_name = this.value.replace('C:\\fakepath\\',"");
        $('#featured_image').append( '<option value='+image_name+'>' + image_name + '</option>' );
        $('#featured_image_div').show();

  });

  $(document).on('change','.guest_photo_div',function(){
    //console.log(this.value);
    console.log(this.value.replace('C:\\fakepath\\',""));
    var input_id = $(this).attr("guest_photo_div");
    console.log($(this).attr("guest_photo_div"));
    $('#'+input_id).val(this.value.replace('C:\\fakepath\\',""));
    //var image_name = this.value.replace('C:\\fakepath\\',"");
        //$('#featured_image').append( '<option value='+image_name+'>' + image_name + '</option>' );
       // $('#featured_image_div').show();

  });


    </script>

@endsection








