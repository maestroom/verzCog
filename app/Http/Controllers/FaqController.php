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

class FaqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            
            if ($this->view_permission(@Auth::user()->role_type_id,2) === 0) {  

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

        $Faq = \DB::table('faq')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,2);
        return view("backEnd.faq", compact("Faq","CheckLayoutPermission"));

    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,2) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Faq Module');
        }
        $Faq = \DB::table('faq')->where('id', $id)->get();

        if (count($Faq) > 0) {
            return view("backEnd.faq.edit", compact("Faq"));
        } else {
            return redirect()->action('FaqController@index');
        }
    }


    public function update(Request $request, $id)
    {

        \DB::table('faq')->where('id', $id)->update(
             ['name' => $request->title,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        \Session::flash('success', 'Faq Updated Successfully'); 
        return redirect()->action('FaqController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {

        if ($this->create_permission(@Auth::user()->role_type_id,2) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Faq Module');
        }
        return view("backEnd.faq.create");
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',

        ]);


        \DB::table('faq')->insert(
            ['name' => $request->title,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FaqController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,2) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Faq Module');
        }
        $Faq = \DB::table('faq')->where('id', $id)->get();
       
        if (count($Faq) > 0) {

            \DB::table('faq')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            \DB::table('faqquestions')
            ->where('faq_id', $id)
            ->update(['delete_status' => 1]);

            \DB::table('faqanswers')
            ->where('faq_id', $id)
            ->update(['delete_status' => 1]);


            return redirect()->action('FaqController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('FaqController@index');
        }
    }

















    public function faqQuestionsindex($id)
    {

        $FaqQuestions = \DB::table('faqQuestions')->where('faq_id', $id)->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,2);

        return view("backEnd.faq.faqQuestions.faqQuestions", compact("FaqQuestions","id","CheckLayoutPermission"));

    }

    public function faqQuestionscreate($id)
    {
        return view("backEnd.faq.faqQuestions.create", compact("id"));
    }

    public function faqQuestionsedit($id)
    {

        $FaqQuestions = \DB::table('faqquestions')->where('id', $id)->where('delete_status', 0)->get();

        if (count($FaqQuestions) > 0) {
            return view("backEnd.faq.faqQuestions.edit", compact("FaqQuestions"));
        } else {
            return redirect()->action('FaqController@faqQuestionsindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }

    public function faqQuestionsupdate(Request $request, $id)
    {

        $this->validate($request, [
            'question' => 'required',

        ]);


        \DB::table('faqquestions')->where('id', $id)->update(
            ['question' => $request->question,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FaqController@faqQuestionsindex',array('id'=>$request->faq_id))->with('doneMessage', 'Faq Question Updated Successfully');
    }

    public function faqQuestionsstore(Request $request)
    {

        $this->validate($request, [
            'question' => 'required',

        ]);


        \DB::table('faqquestions')->insert(
            ['question' => $request->question,'faq_id' => $request->faq_id,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FaqController@faqQuestionsindex',array('id'=>$request->faq_id))->with('doneMessage', trans('backLang.addDone'));
    }

    public function faqQuestionsdestroy($id)
    {

        $Faq = \DB::table('faqquestions')->where('id', $id)->get();
       
        if (count($Faq) > 0) {

            \DB::table('faqquestions')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('FaqController@faqQuestionsindex',array('id'=>$id))->with('doneMessage', trans('backLang.addDone'));
        } else {
            return redirect()->action('FaqController@faqQuestionsindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }










    public function faqAnswersindex($faq_id,$id)
    {

        $FaqAnswers = \DB::table('faqanswers')->where('faq_question_id', $id)->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,2);

        return view("backEnd.faq.faqAnswers.faqAnswers", compact("FaqAnswers", "id","faq_id","CheckLayoutPermission"));

    }

    public function faqAnswerscreate($faq_id,$id)
    {
        return view("backEnd.faq.faqAnswers.create", compact("id","faq_id"));
    }

    public function faqAnswersedit($question_id,$id)
    {

/*
        if (@Auth::user()->permissionsGroup->view_status) {
            //$Faq = User::where('created_by', '=', Auth::user()->id)->find($id);
            $FaqQuestions = \DB::table('faqquestions')->where('id', $id)->where('delete_status', 0)->get();

        } else {
            $FaqQuestions = \DB::table('faqquestions')->where('id', $id)->where('delete_status', 0)->get();
        }*/
        $FaqAnswers = \DB::table('faqanswers')->where('id', $id)->where('delete_status', 0)->get();

        if (count($FaqAnswers) > 0) {
            return view("backEnd.faq.faqAnswers.edit", compact("FaqAnswers","question_id"));
        } else {
            return redirect()->action('FaqController@faqAnswersindex',array('id'=>$id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }

    public function faqAnswersupdate(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',

        ]);


        \DB::table('faqanswers')->where('id', $id)->update(
            ['title' => $request->title,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FaqController@faqAnswersindex',array('faq_id'=>$request->faq_id,'id'=>$request->faq_question_id))->with('doneMessage', 'Faq Answers Updated Successfully');
    }

    public function faqAnswersstore(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',

        ]);


        \DB::table('faqanswers')->insert(
            ['title' => $request->title,'faq_question_id' => $request->faq_question_id,'faq_id' => $request->faq_id,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FaqController@faqAnswersindex',array('faq_id'=>$request->faq_id,'id'=>$request->faq_question_id))->with('doneMessage', trans('backLang.addDone'));
    }

    public function faqAnswersdestroy($id)
    {

        $FaqAnswers = \DB::table('faqanswers')->where('id', $id)->get();
       
        if (count($FaqAnswers) > 0) {

            \DB::table('faqanswers')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('FaqController@faqAnswersindex',array('faq_id'=>$FaqAnswers[0]->faq_id,'id'=>$FaqAnswers[0]->faq_question_id))->with('doneMessage', trans('backLang.addDone'));
        } else {
            return redirect()->action('FaqController@faqAnswersindex',array('faq_id'=>$FaqAnswers[0]->faq_id,'id'=>$FaqAnswers[0]->faq_question_id))->with('doneMessage', 'Something went wrong contact admin');
        }
    }



}