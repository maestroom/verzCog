

@extends('backEnd.layout')

@section('headerInclude')
    <link href="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.min.css") }}" rel="stylesheet">


@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Edit Fellowship</h3>
                <small>
                    <a href="{{ route('fellowship') }}">Fellowship</a> /
                    <a href="">Edit Fellowship</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("fellowship")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
{{Form::open(['route'=>['fellowshipUpdate',$Fellowship[0]->id],'id'=>'$Fellowship[0]->id', 'method'=>'POST', 'files' => true])}}
  <div class="form-group row">
   
    <div class="form-group col-md-12">
            <div class="form-group col-md-5">
                <label for="dtp_input1" class="control-label">Start date</label>
                <div class="input-group date form_datetime start_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="start_date" value="{!! $Fellowship[0]->start_date !!}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>


            <div class="form-group col-md-5">
                <label for="dtp_input1" class="control-label">End date</label>
                <div class="input-group date form_datetime end_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" name="end_date" type="text" value="{!! $Fellowship[0]->end_date !!}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
    </div>
  </div>
    <div class="form-group">
    <label>Fellowship Title:</label>
    <input type="text" class="form-control" value="{!! $Fellowship[0]->title !!}" name="title" id="title">
  </div>

    <div class="form-group">
      <label for="contents">Contents:</label>
      <textarea class="form-control" rows="5" id="contents" name="contents">{!! $Fellowship[0]->contents !!}</textarea>
    </div>


<div class="form-group row">
<label for="contents">Fellowship Images (Additional Images are added):</label>
<div id="filediv" class="col-md-2"><input name="file[]" class="form-control file_event_image" type="file" id="file"/></div>
<input type="button" id="add_more"  class="upload" value="Add More Files"/>
</div>


    <div class="form-group" id="featured_image_div" style="display:none;">
    <label>Select Featured image:</label>
        <select name="featured_image" class="form-control" id="featured_image">
        @foreach(unserialize($Fellowship[0]->images_array) as $value1)
            <option value="{{$value1}}">{{$value1}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Fellowship Location:</label>
            <input type="text" class="form-control" value="{!! $Fellowship[0]->location !!}" name="fellowship_location" id="fellowship_location">
    </div>

    <div class="form-group">
        <label for="dtp_input3" class="control-label">Registration Cutoff date</label>
        <div class="input-group date form_datetime registration_cutoff_date" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
            <input class="form-control" size="16" type="text" name="registration_cutoff_date" value="{!! $Fellowship[0]->registration_cutoff_date !!}" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="dtp_input3" value="" /><br/>
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

        $('.start_datetime , .end_datetime, .registration_cutoff_date').datetimepicker({
        //language:  'fr',

        format: "yyyy-mm-dd HH:ii:ss",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        minuteStep: 10
        });


 $(document).on('change','.file_event_image',function(){
    console.log(this.value.replace('C:\\fakepath\\',""));
    var image_name = this.value.replace('C:\\fakepath\\',"");
        $('#featured_image').append( '<option value='+image_name+'>' + image_name + '</option>' );
        $('#featured_image_div').show();

  });
});

    </script>

@endsection












