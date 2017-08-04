@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Quiz</h3>
                <small>
                    <a href="{{ route('quiz') }}">Quiz Management</a> /
                    <a href="#">Edit Quiz</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("quiz")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['quizUpdate',$Quiz[0]->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group">
                    <label>Quiz Name:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{!! $Quiz[0]->name !!}">
                </div>

                <div class="form-group">
                    <label for="contents">Description :</label>
                        <textarea class="form-control" rows="5" id="contents" name="contents">{!! $Quiz[0]->contents !!}</textarea>
                </div>

                <div class="form-group">
                    <label>year:</label>
                    <input type="text" class="form-control" name="year" id="year" value="{!! $Quiz[0]->year !!}">
                </div>

                <div class="form-group">
                <label>Type:</label>
                    <select name="type" class="form-control">
                        <option @if($Quiz[0]->type==0) selected=selected @endif value="0">Basic</option>
                        <option @if($Quiz[0]->type==1) selected=selected @endif value="1">Advanced</option>
                    </select>
                </div>


                <div class="form-group">
                <label>Status:</label>
                    <select name="status" class="form-control">
                        <option @if($Quiz[0]->status==1) selected=selected @endif value="1">Active</option>
                        <option @if($Quiz[0]->status==0) selected=selected @endif value="0">Not Active</option>
                    </select>
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> Update</button>
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
    
      $(document).on('change','.company_logo_div',function(){
    //console.log(this.value);
    console.log(this.value.replace('C:\\fakepath\\',""));
    $('#company_logo_photo').val(this.value.replace('C:\\fakepath\\',""));

  });
})
</script>

@endsection