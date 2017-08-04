@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Quiz Answers</h3>
                <small>
                    <a href="{{ route('quiz') }}">Quiz Answers Management</a> /
                    <a href="#">Edit Quiz Answer</a>
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
                {{Form::open(['route'=>['quizAnswersUpdate',$QuizAnswers[0]->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group">
                    <label>label:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $QuizAnswers[0]->title }}">
                </div>

                 <input type="hidden" class="form-control" name="quiz_question_id" id="quiz_question_id" value={!! $question_id !!}>

                 <input type="hidden" class="form-control" name="quiz_id" id="quiz_id" value={{ $QuizAnswers[0]->quiz_id }}>

                <div class="form-group">
                    <label>Note:</label>
                    <input type="text" class="form-control" name="note" id="note" value="{{  $QuizAnswers[0]->note }}">
                </div>

                <div class="form-group">
                <label>Is Others:</label>
                    <select name="is_others" class="form-control">
                        <option @if($QuizAnswers[0]->is_others==1) selected=selected @endif value="1">Yes</option>
                        <option @if($QuizAnswers[0]->is_others==0) selected=selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                <label>Is None:</label>
                    <select name="is_none" class="form-control">
                        <option @if($QuizAnswers[0]->is_none==1) selected=selected @endif value="1">Yes</option>
                        <option @if($QuizAnswers[0]->is_none==0) selected=selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                <label>Category:</label>
                    <select name="answer_cat" class="form-control">
                        <option @if($QuizAnswers[0]->answer_cat==0) selected=selected @endif value="1">Investment</option>
                        <option @if($QuizAnswers[0]->answer_cat==1) selected=selected @endif value="1">Integration</option>
                        <option @if($QuizAnswers[0]->answer_cat==2) selected=selected @endif value="1">Institutionalisation</option>
                        <option @if($QuizAnswers[0]->answer_cat==3) selected=selected @endif value="1">Impact</option>
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