<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{

            if (@Auth::user()->role_type_id == 4 || @Auth::user()->role_type_id == 3) {  
            //return \Redirect::to(route('quizFront'))->send();
                return view('home');
            }else{
                $day = date("d")."-".date("m")."-".date("Y");
                $update_tracker = $this->updateTracker($day,"web_visitor");

                return \Redirect::to(route('tracking'))->send();
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{

            if (@Auth::user()->role_type_id == 4 || @Auth::user()->role_type_id == 3) {  
            return view('home');
            }
            else{
                return \Redirect::to(route('tracking'))->send();
            }
        }


    }
}
