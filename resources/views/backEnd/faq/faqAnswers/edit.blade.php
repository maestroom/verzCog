@extends('backEnd.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Faq Answers</h3>
                <small>
                    <a href="{{ route('faq') }}">Faq Answers Management</a> /
                    <a href="#">Edit Faq Answer</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("faq")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['faqAnswersUpdate',$FaqAnswers[0]->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group">
                    <label>label:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $FaqAnswers[0]->title }}">
                </div>

                 <input type="hidden" class="form-control" name="faq_question_id" id="faq_question_id" value={!! $question_id !!}>

                 <input type="hidden" class="form-control" name="faq_id" id="faq_id" value={{ $FaqAnswers[0]->faq_id }}>


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