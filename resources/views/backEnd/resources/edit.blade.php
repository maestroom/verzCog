

@extends('backEnd.layout')

@section('headerInclude')
    <link href="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.min.css") }}" rel="stylesheet">


@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Add New Resource</h3>
                <small>
                    <a href="{{ route('events') }}">Resources</a> /
                    <a href="">Edit Resources</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("resources")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">

{{Form::open(['route'=>['resourcesUpdate',$Resources[0]->id],'id'=>'bootstrapTagsInputForm', 'method'=>'POST', 'files' => true])}}

    <div class="form-group">
        <label>Resource Name:</label>
        <input type="text" class="form-control" name="title" id="title" value="{!! $Resources[0]->title !!}">
    </div>

    <div class="form-group">
        <label for="contents">One Liner:</label>
        <input type="text" class="form-control" name="one_liner" id="one_liner" value="{!! $Resources[0]->one_liner !!}">
    </div>

    <div class="form-group">
        <label for="contents">Resources Summary:</label>
        <textarea class="form-control" rows="5" id="resources_summary" name="resources_summary">{!! $Resources[0]->contents !!}</textarea>
    </div>

    <div class="form-group">
        <label>Category Type:</label>
        <select name="category_type" class="form-control" id="category_type">
            <option value="0" @if($Resources[0]->type==0) selected=selected @endif>Case Studies</option>
            <option value="1" @if($Resources[0]->type==1) selected=selected @endif>Nvpc Publications</option>
            <option value="2" @if($Resources[0]->type==2) selected=selected @endif>Guides & Tools</option>
        </select>
    </div>
    <div class="form-group row">
        <div id="filediv" class="col-sm-1><input name="file[]" class="form-control file_event_image" type="file" id="file"/></div>
        <input type="button" id="add_more"  class="upload" value="Add More Files"/>
    </div>

    <div class="form-group" id="featured_image_div" style="display:none;">
    <label>Select Featured image:</label>
        <select name="featured_image" class="form-control" id="featured_image">
        @foreach(unserialize($Resources[0]->images_array) as $value1)
            <option value="{{$value1}}">{{$value1}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Select Tag:</label>
        <select name="tags[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Tags as $k => $v)
            <option value="{{$v->id}}"
        @foreach(unserialize($Resources[0]->tags) as $key1 => $value1)
            @if($value1==$v->id) selected=selected @endif
            @endforeach>{{$v->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Select Topic:</label>
        <select name="Resources_topic[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Resources_topic as $k => $v)
            <option value="{{$v->id}}"
            @foreach(unserialize($Resources[0]->topics) as $key1 => $value1)
                @if($value1==$v->id) 
                    selected=selected 
                @endif
            @endforeach>{{$v->title}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Upload Resource PDF file:</label><input name="resources_file" class="form-control uploaded_pdf_name" type="file" id="resources_file"/>
        <input name="pdf_name" class="form-control" type="hidden" id="pdf_name"/>

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


         $(document).on('change','.file_resource_image',function(){
            //console.log(this.value);
            console.log(this.value.replace('C:\\fakepath\\',""));
            var image_name = this.value.replace('C:\\fakepath\\',"");
                $('#featured_image').append( '<option value='+image_name+'>' + image_name + '</option>' );
                $('#featured_image_div').show();

          });

        $('#selectpicker1,#selectpicker').select2();

            $(document).on('change','.file_event_image',function(){
            //console.log(this.value);
                console.log(this.value.replace('C:\\fakepath\\',""));
                var image_name = this.value.replace('C:\\fakepath\\',"");
                    $('#featured_image').append( '<option value='+image_name+'>' + image_name + '</option>' );
                    $('#featured_image_div').show();

            });

            $(document).on('change','.uploaded_pdf_name',function(){
                console.log(this.value.replace('C:\\fakepath\\',""));
                $('#pdf_name').val(this.value.replace('C:\\fakepath\\',""));

            });

    });

    </script>

@endsection














