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
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class QuizFrontController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {

/*
Subscribe and Unsubscribe from mailchimp
        $client = new \GuzzleHttp\Client();
        $hash_email = md5('someone@gmail.com');
        $res = $client->request('PATCH','https://us16.api.mailchimp.com/3.0/lists/682e81a5f6/members/'.$hash_email, [
            'auth' => ['apikey', '60b553c9a3856d089bcab1c6635ae192-us16'],
                'json' => [
                    
                    'status' => 'unsubscribed'
                ]
        ]);
        echo $res->getStatusCode();
        echo $res->getBody();  


        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST','https://us16.api.mailchimp.com/3.0/lists/682e81a5f6/members/', [
            'auth' => ['apikey', '60b553c9a3856d089bcab1c6635ae192-us16'],
                'json' => [
                    'email_address' => 'someonenew@gmail.com',
                    'status' => 'subscribed'
                ]
        ]);
        echo $res->getStatusCode();
        echo $res->getBody();  */

//'status' => 'subscribed'


        $Quiz_id= 3;
        $Quiz = \DB::table('quiz')->where('delete_status', 0)->where('id', $Quiz_id)->get();
        $QuizQuestions = \DB::table('quizquestions')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->get();
        $QuizAnswers = \DB::table('quizanswers')->where('delete_status', 0)->get();

/*        $Invest = ;
        $Integration = ;
        $Institution = ;
        $Impact = ;*/

        $Invest_count = \DB::table('quizanswers')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->where('answer_cat', 0)->count();
        $Integration_count = \DB::table('quizanswers')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->where('answer_cat', 1)->count();

        $Institution_count = \DB::table('quizanswers')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->where('answer_cat', 2)->count();

        $Impact_count = \DB::table('quizanswers')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->where('answer_cat', 3)->count();


/*        echo 100/$Invest_count;echo "<br>";
        echo 100/$Integration_count;echo "<br>";
        echo 100/$Institution_count;echo "<br>";
        echo 100/$Impact_count;*/
        $Invest_percent = 100/$Invest_count;
        $Integration_percent = 100/$Integration_count;
        $Institution_percent = 100/$Institution_count;
        $Impact_percent = 100/$Impact_count;

        //exit;

        return view("frontEnd.quiz", compact("Quiz", "QuizQuestions","QuizAnswers","Invest_percent","Integration_percent","Institution_percent","Impact_percent"));

    }

    public function Store(Request $request)
    {

        print_R($request->quiz_answer);

        $Invest_score=0;
        $Integration_score=0;
        $Institution_score=0;
        $Impact_score=0;
        $Quiz_id = 3;



        $users_quiz_result = \DB::table('users_quiz_result')->insertGetId(
                ['year' => (date("M")."-".date("Y")),'quiz_id'=>$Quiz_id,'user_id' => Auth::user()->id,'invest_percent'=>$Invest_score,'integration_percent'=>$Integration_score,'institution_percent'=>$Institution_score,'impact_percent'=>$Impact_score,'created_at'=>Carbon::now()->toDateTimeString()]
            );



        foreach($request->quiz_answer as $key=>$value)
        {

            foreach($value as $key1=>$value1)
            {
                $find_category = \DB::table('quizanswers')->where('delete_status', 0)->where('quiz_id', $Quiz_id)->where('id', $value1)->select("answer_cat")->get();

                //print_R($find_category[0]->answer_cat);echo "<br>";
                if($find_category[0]->answer_cat==0)
                {
                    $Invest_score += $request->Invest_percent;
                }
                if($find_category[0]->answer_cat==1)
                {
                    $Integration_score += $request->Integration_percent;
                }
                if($find_category[0]->answer_cat==2)
                {
                    $Institution_score += $request->Institution_percent;
                }
                if($find_category[0]->answer_cat==3)
                {
                    $Impact_score += $request->Impact_percent;
                }


                $users_quiz_answer = \DB::table('users_quiz_answers')->insertGetId(
                    ['year' => (date("M")."-".date("Y")),'quiz_id'=>$Quiz_id,'users_quiz_result_id'=>$users_quiz_result,'user_id' => Auth::user()->id,'question_id'=>$key,'answer_id'=>$value1,'created_at'=>Carbon::now()->toDateTimeString()]
                );

            }

        }


        $users_quiz_result_update = \DB::table('users_quiz_result')->where('id', $users_quiz_result)->update(
                ['invest_percent'=>$Invest_score,'integration_percent'=>$Integration_score,'institution_percent'=>$Institution_score,'impact_percent'=>$Impact_score]
            );


        echo "Invest_score = ".$Invest_score."%";echo "<br>";
        echo "Integration_score = ".$Integration_score."%";echo "<br>";
        echo "Institution_score = ".$Institution_score."%";echo "<br>";
        echo "Impact_score = ".$Impact_score."%";echo "<br>";






        $QuizRep = \DB::table('users')->where('company', Auth::user()->company)->where('quiz_rep', 1)->get()->count();

        if($QuizRep == 0)
        {
                $users_quiz_result = \DB::table('users')->where('id', Auth::user()->id)->update(
                    ['quiz_rep' => 1,'updated_at'=>Carbon::now()->toDateTimeString()]
                );
        }
        echo $QuizRep;    
        exit;

    }


}