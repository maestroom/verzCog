<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests;
use App\WebmasterBanner;
use App\WebmasterSection;
use App\Permissions;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,5) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }


/*        if (@Auth::user()->role_type_id !== 1 && @Auth::user()->role_type_id !== 2) {  
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }*/
    }


    public function index()
    {

        $Quiz = \DB::table('quiz')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,5);
        return view("backEnd.quiz", compact("Quiz","CheckLayoutPermission"));

    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,5) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Quiz Module');
        }
        $Quiz = \DB::table('quiz')->where('id', $id)->get();

        if (count($Quiz) > 0) {
            return view("backEnd.quiz.edit", compact("Quiz"));
        } else {
            return redirect()->action('QuizController@index');
        }
    }


    public function update(Request $request, $id)
    {

        \DB::table('quiz')->where('id', $id)->update(
             ['name' => $request->title,'contents'=>$request->contents,'year'=>$request->year,'type'=>$request->type,'status'=>$request->status,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        \Session::flash('success', 'Quiz Updated Successfully'); 
        return redirect()->action('QuizController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {

        if ($this->create_permission(@Auth::user()->role_type_id,5) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Quiz Module');
        }
        return view("backEnd.quiz.create");
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'contents' => 'required',
            'year' => 'required',
            'type' => 'required',
            'status' => 'required',

        ]);


        \DB::table('quiz')->insert(
            ['name' => $request->title,'contents'=>$request->contents,'year'=>$request->year,'type'=>$request->type,'status'=>$request->status,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('QuizController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,5) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Quiz Module');
        }
        $Quiz = \DB::table('quiz')->where('id', $id)->get();
       
        if (count($Quiz) > 0) {

            \DB::table('quiz')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            \DB::table('quizquestions')
            ->where('quiz_id', $id)
            ->update(['delete_status' => 1]);

            \DB::table('quizanswers')
            ->where('quiz_id', $id)
            ->update(['delete_status' => 1]);


            return redirect()->action('QuizController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('QuizController@index');
        }
    }

















    public function quizQuestionsindex($id)
    {

        $QuizQuestions = \DB::table('quizQuestions')->where('quiz_id', $id)->where('status', 1)->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,5);

        return view("backEnd.quiz.quizQuestions.quizQuestions", compact("QuizQuestions","id","CheckLayoutPermission"));

    }

    public function quizQuestionscreate($id)
    {
        return view("backEnd.quiz.quizQuestions.create", compact("id"));
    }

    public function quizQuestionsedit($id)
    {

        $QuizQuestions = \DB::table('quizquestions')->where('id', $id)->where('delete_status', 0)->get();

        if (count($QuizQuestions) > 0) {
            return view("backEnd.quiz.quizQuestions.edit", compact("QuizQuestions"));
        } else {
            return redirect()->action('QuizController@quizQuestionsindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }

    public function quizQuestionsupdate(Request $request, $id)
    {

        $this->validate($request, [
            'question' => 'required',
            'hint' => 'required',
            'question_cat' => 'required'

        ]);


        \DB::table('quizquestions')->where('id', $id)->update(
            ['question' => $request->question,'hint' => $request->hint,'question_cat' => $request->question_cat,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('QuizController@quizQuestionsindex',array('id'=>$request->quiz_id))->with('doneMessage', 'Quiz Question Updated Successfully');
    }

    public function quizQuestionsstore(Request $request)
    {

        $this->validate($request, [
            'question' => 'required',
            'hint' => 'required',
            'question_cat' => 'required'

        ]);


        \DB::table('quizquestions')->insert(
            ['question' => $request->question,'hint' => $request->hint,'question_cat' => $request->question_cat,'quiz_id' => $request->quiz_id,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('QuizController@quizQuestionsindex',array('id'=>$request->quiz_id))->with('doneMessage', trans('backLang.addDone'));
    }

    public function quizQuestionsdestroy($id)
    {

        $Quiz = \DB::table('quizquestions')->where('id', $id)->get();
       
        if (count($Quiz) > 0) {

            \DB::table('quizquestions')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('QuizController@quizQuestionsindex',array('id'=>$id))->with('doneMessage', trans('backLang.addDone'));
        } else {
            return redirect()->action('QuizController@quizQuestionsindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }










    public function quizAnswersindex($quiz_id,$id)
    {

        $QuizAnswers = \DB::table('quizanswers')->where('quiz_question_id', $id)->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,5);

        return view("backEnd.quiz.quizAnswers.quizAnswers", compact("QuizAnswers", "id","quiz_id","CheckLayoutPermission"));

    }

    public function quizAnswerscreate($quiz_id,$id)
    {
        return view("backEnd.quiz.quizAnswers.create", compact("id","quiz_id"));
    }

    public function quizAnswersedit($question_id,$id)
    {

/*
        if (@Auth::user()->permissionsGroup->view_status) {
            //$Quiz = User::where('created_by', '=', Auth::user()->id)->find($id);
            $QuizQuestions = \DB::table('quizquestions')->where('id', $id)->where('delete_status', 0)->get();

        } else {
            $QuizQuestions = \DB::table('quizquestions')->where('id', $id)->where('delete_status', 0)->get();
        }*/
        $QuizAnswers = \DB::table('quizanswers')->where('id', $id)->where('delete_status', 0)->get();

        if (count($QuizAnswers) > 0) {
            return view("backEnd.quiz.quizAnswers.edit", compact("QuizAnswers","question_id"));
        } else {
            return redirect()->action('QuizController@quizAnswersindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }

    public function quizAnswersupdate(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'note' => 'required',
            'is_none' => 'required',
            'is_others' => 'required',
            'answer_cat' => 'required',

        ]);


        \DB::table('quizanswers')->where('id', $id)->update(
            ['title' => $request->title,'note' => $request->note,'is_none' => $request->is_none,'is_others' => $request->is_others,'answer_cat' => $request->answer_cat,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('QuizController@quizAnswersindex',array('quiz_id'=>$request->quiz_id,'id'=>$request->quiz_question_id))->with('doneMessage', 'Quiz Answers Updated Successfully');
    }

    public function quizAnswersstore(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'note' => 'required',
            'is_none' => 'required',
            'is_others' => 'required',
            'answer_cat' => 'required'

        ]);


        \DB::table('quizanswers')->insert(
            ['title' => $request->title,'note' => $request->note,'is_none' => $request->is_none,'quiz_question_id' => $request->quiz_question_id,'quiz_id' => $request->quiz_id,'is_others' => $request->is_others,'answer_cat' => $request->answer_cat,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('QuizController@quizAnswersindex',array('quiz_id'=>$request->quiz_id,'id'=>$request->quiz_question_id))->with('doneMessage', trans('backLang.addDone'));
    }

    public function quizAnswersdestroy($id)
    {

        $QuizAnswers = \DB::table('quizanswers')->where('id', $id)->get();
       
        if (count($QuizAnswers) > 0) {

            \DB::table('quizanswers')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('QuizController@quizAnswersindex',array('quiz_id'=>$QuizAnswers[0]->quiz_id,'id'=>$QuizAnswers[0]->quiz_question_id))->with('doneMessage', trans('backLang.addDone'));
        } else {
            return redirect()->action('QuizController@quizAnswersindex',array('quiz_id'=>$QuizAnswers[0]->quiz_id,'id'=>$QuizAnswers[0]->quiz_question_id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }






    public function userQuizResults()
    {

        $userQuizAnswerResults = \DB::table('users_quiz_answers')
        ->join('users', 'users_quiz_answers.user_id', '=', 'users.id')
        ->select('users.name as user_name','users.id as user_id', 'users_quiz_answers.year as year','users_quiz_answers.question_id as question_id','users_quiz_answers.users_quiz_result_id as users_quiz_result_id','users_quiz_answers.answer_id as answer_id')->where('users_quiz_answers.delete_status', 0)
        ->get();


        $userQuizResults = \DB::table('users_quiz_result')->select('id','users_quiz_result.year as year','users_quiz_result.invest_percent as invest_percent','users_quiz_result.integration_percent as integration_percent','users_quiz_result.institution_percent as institution_percent','users_quiz_result.impact_percent as impact_percent')->where('users_quiz_result.delete_status', 0)->get();

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,5);

        $FinalArray = array();
        $count_result = 0;





    foreach($userQuizResults as $key=>$value){
        foreach($userQuizAnswerResults as $key1=>$value1)
        {
            if($value->id==$value1->users_quiz_result_id)
            {


                $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['question_answer'][$value1->question_id][] = $value1->answer_id; 
                

                if (array_key_exists("quiz_result",$FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]))
                {
                  if(count($FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'])<4)
                    {
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->invest_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->integration_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->institution_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->impact_percent;
                    }
                }
                else{
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->invest_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->integration_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->institution_percent; 
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['quiz_result'][] = $value->impact_percent;
                        $FinalArray[$value1->users_quiz_result_id][$value1->year][$value1->user_name]['Quiz_result_id'] = $value->id; 
                }

            }
        }


    }



/*    foreach($userQuizResults as $key=>$value){
        foreach($userQuizAnswerResults as $key1=>$value1)
        {
            if($value->year==$value1->year)
            {


                $FinalArray[$value1->year][$value1->user_name]['question_answer'][$value1->question_id][] = $value1->answer_id; 
                

                if (array_key_exists("quiz_result",$FinalArray[$value1->year][$value1->user_name]))
                {
                  if(count($FinalArray[$value1->year][$value1->user_name]['quiz_result'])<4)
                    {
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->invest_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->integration_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->institution_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->impact_percent;
                    }
                }
                else{
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->invest_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->integration_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->institution_percent; 
                        $FinalArray[$value1->year][$value1->user_name]['quiz_result'][] = $value->impact_percent;
                        $FinalArray[$value1->year][$value1->user_name]['Quiz_result_id'] = $value->id; 
                }

            }
        }


    }*/

/*echo "<pre>";
print_R($FinalArray);
echo "</pre>";
exit;*/



        return view("backEnd.quizresults", compact("FinalArray","CheckLayoutPermission"));

    }



    public function userQuizResultsdestroy($id)
    {
        if ($this->delete_permission(@Auth::user()->role_type_id,5) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Quiz Answers Module');
        }

        $User = \DB::table('users')->where('id', $id)->get();


            \DB::table('users_quiz_result')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            \DB::table('users_quiz_answers')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('QuizController@userQuizResults')->with('doneMessage', trans('Quiz Result deleted Successfully'));

    }


}