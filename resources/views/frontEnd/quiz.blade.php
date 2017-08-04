
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



{{Form::open(['route'=>['quizFrontStore'],'method'=>'POST', 'files' => true])}}


    @foreach($QuizQuestions as $quizquestions)
        <br>
            <b>{{ $quizquestions->question}}</b>
            @foreach($QuizAnswers as $quizanswers)
                @if($quizanswers->quiz_question_id==$quizquestions->id)
                    <input type="checkbox" name="quiz_answer[{{$quizquestions->id}}][]" value="{{$quizanswers->id}}">{{ $quizanswers->title}}({{ $quizanswers->answer_cat}})
                @endif
            @endforeach
        <br>
    @endforeach

    <input type="hidden" name="Invest_percent" value="{{$Invest_percent}}">
    <input type="hidden" name="Integration_percent" value="{{$Integration_percent}}">
    <input type="hidden" name="Institution_percent" value="{{$Institution_percent}}">
    <input type="hidden" name="Impact_percent" value="{{$Impact_percent}}">


<button type="submit" class="btn btn-default">Submit</button>

{{Form::close()}}


    <script type="text/javascript">
    $(document).ready(function(){
        //alert("sdsd");
    })   
    </script>

