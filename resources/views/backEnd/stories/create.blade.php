@extends('backEnd.layout')

@section('headerInclude')
<link href="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.min.css") }}" rel="stylesheet">



@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Add New Story</h3>
                <small>
                    <a href="{{ route('stories') }}">Stories</a> /
                    <a href="">Add New Stories</a>
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

{{Form::open(['route'=>['storiesStore'],'id'=>'bootstrapTagsInputForm', 'method'=>'POST', 'files' => true])}}

    <div class="form-group">
        <label>Stories Name:</label>
        <input type="text" class="form-control" name="title" id="title">
    </div>

        <input type="hidden" class="form-control" value="1" name="story_by" id="story_by">

    <div class="form-group">
        <label for="contents">Stories contents:</label>
        <textarea class="form-control" rows="5" id="stories_contents" name="stories_contents"></textarea>
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
    <label>Select Tag: You can select "featured" tag if you want to display Featured</label>
        <select name="tags[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Tags as $k => $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
    <label>Select Categories:</label>
        <select name="Stories_topic[]" class="form-control" id="selectpicker" multiple=multiple>
        @foreach($Stories_topic as $k => $v)
            <option value="{{$v->id}}">{{$v->title}}</option>
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

    });

    </script>



@endsection














