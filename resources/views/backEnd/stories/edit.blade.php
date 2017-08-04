@extends('backEnd.layout')
@section('headerInclude')
@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Add New Story</h3>
                <small>
                    <a href="{{ route('stories') }}">Stories</a> /
                    <a href="">Edit Story</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("stories")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">

{{Form::open(['route'=>['storiesUpdate',$Stories[0]->id],'id'=>'bootstrapTagsInputForm', 'method'=>'POST', 'files' => true])}}

    <div class="form-group">
        <label>Resource Name:</label>
        <input type="text" class="form-control" name="title" id="title" value="{!! $Stories[0]->title !!}">
    </div>

    <div class="form-group">
        <label for="contents">Stories Contents:</label>
        <textarea class="form-control" rows="5" id="stories_contents" name="stories_contents">{!! $Stories[0]->contents !!}</textarea>
    </div>

    <div class="form-group row">
        <div id="filediv" class="col-sm-1"><input name="file[]" class="form-control file_event_image" type="file" id="file"/></div>
        <input type="button" id="add_more"  class="upload" value="Add More Files"/>
    </div>

    <div class="form-group" id="featured_image_div" style="display:none;">
    <label>Select Featured image:</label>
        <select name="featured_image" class="form-control" id="featured_image">
        @foreach(unserialize($Stories[0]->images_array) as $value1)
            <option value="{{$value1}}">{{$value1}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Select Tag:</label>
        <select name="tags[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Tags as $k => $v)
            <option value="{{$v->id}}"
        @foreach(unserialize($Stories[0]->tags) as $key1 => $value1)
            @if($value1==$v->id) selected=selected @endif
            @endforeach>{{$v->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Select Topic:</label>
        <select name="Stories_topic[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Stories_topic as $k => $v)
            <option value="{{$v->id}}"
            @foreach(unserialize($Stories[0]->topics) as $key1 => $value1)
                @if($value1==$v->id) 
                    selected=selected 
                @endif
            @endforeach>{{$v->title}}
            </option>
            @endforeach
        </select>
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














