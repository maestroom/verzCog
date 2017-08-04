@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Quiz Question</h3>
                <small>
                    <a href="{{ route('quiz') }}">Quiz Question Management</a> /
                    <a href="#">Edit Quiz Question</a>
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
                {{Form::open(['route'=>['quizQuestionsUpdate',$QuizQuestions[0]->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group">
                    <label>Question:</label>
                    <input type="text" class="form-control" name="question" id="question" value="{{ $QuizQuestions[0]->question }}">
                </div>

                 <input type="hidden" class="form-control" name="quiz_id" id="quiz_id" value="{{ $QuizQuestions[0]->quiz_id }}">

                <div class="form-group">
                    <label>Hint:</label>
                    <input type="text" class="form-control" name="hint" id="hint" value="{{  $QuizQuestions[0]->hint }}">
                </div>

                <div class="form-group">
                <label>Category:</label>
                    <select name="question_cat" class="form-control">
                        <option @if($QuizQuestions[0]->question_cat==0) selected=selected @endif value="1">Investment</option>
                        <option @if($QuizQuestions[0]->question_cat==1) selected=selected @endif value="0">Integration</option>
                        <option @if($QuizQuestions[0]->question_cat==2) selected=selected @endif value="0">Institutionalisation</option>
                        <option @if($QuizQuestions[0]->question_cat==3) selected=selected @endif value="0">Impact</option>
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