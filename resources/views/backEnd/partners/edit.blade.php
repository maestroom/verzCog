@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>create partners</h3>
                <small>
                    <a href="{{ route('partners') }}">Partners Management</a> /
                    <a href="#">Edit Partner</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("partners")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['partnersUpdate',$Partners[0]->id],'method'=>'POST', 'files' => true])}}


                <div class="form-group">
                    <label>Company Name:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{!! $Partners[0]->name !!}" >
                </div>

                <div id="filediv"><label>Upload Company logo:</label><input name="company_logo" class="form-control company_logo_div" type="file" id="file"/></div><br/>
                <input type="button" id="add_more"  class="upload" value="Add More Files" style="display:none;"/>

                <input type="hidden" class="form-control" name="company_logo_photo" id="company_logo_photo">

                <div class="form-group">
                    <label>Company Link:</label>
                    <input type="text" class="form-control" name="company_link" id="company_link" value="{!! $Partners[0]->company_link !!}" >
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> Update</button>
                        <a href="{{route("partners")}}"
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
    
      $(document).on('change','.company_logo_div',function(){
    //console.log(this.value);
    console.log(this.value.replace('C:\\fakepath\\',""));
    $('#company_logo_photo').val(this.value.replace('C:\\fakepath\\',""));

  });
})
</script>

@endsection