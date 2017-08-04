@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Create Banner</h3>
                <small>
                    <a href="{{ route('banners') }}">Banners Management</a> /
                    <a href="#">Edit Banner</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("banners")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['bannersStore'],'method'=>'POST', 'files' => true])}}

                <div class="form-group">
                    <label>Banner Name:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>


                <div id="filediv"><label>Upload Banner:</label><input name="banner_image" class="form-control banner_image_div" type="file" id="file"/></div><br/>
                <input type="button" id="add_more"  class="upload" value="Add More Files" style="display:none;"/>

                <input type="hidden" class="form-control" name="banner_photo" id="banner_photo">


                <div class="form-group">
                    <label>Banner Link:</label>
                    <input type="text" class="form-control" name="banner_link" id="banner_link">
                </div>


                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> Create</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section('footerInclude')



<script type="text/javascript">
$(function(){
    
      $(document).on('change','.banner_image_div',function(){
    //console.log(this.value);
    console.log(this.value.replace('C:\\fakepath\\',""));
    $('#banner_photo').val(this.value.replace('C:\\fakepath\\',""));

  });
})
</script>

@endsection