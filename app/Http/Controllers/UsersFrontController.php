<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Permissions;
use App\User;
use App\Modules;
use App\WebmasterSection;
use Auth;
use File;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;

class UsersFrontController extends Controller
{

    public function __construct()
    {
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }
        
    }

    public function edit()
    {

        $Users = \DB::table('users')
        ->where('id', @Auth::user()->id)
        ->select('name','email')
        ->get();

        return view("frontEnd.users.edit", compact("Users"));

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'=>   'required|email|unique:users,email,'.@Auth::user()->id

        ]);

        if(isset($request->password))
        {
            $Update_user = \DB::table('users')->where('id', @Auth::user()->id)->update(['name' => $request->name,'email' => $request->email,'password' => bcrypt($request->password),'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);
        }else{

            $Update_user = \DB::table('users')->where('id', @Auth::user()->id)->update(['name' => $request->name,'email' => $request->email,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);
        }

        return redirect()->action('HomeController@index')->with('doneMessage', trans('backLang.addDone'));



    }

    public function destroy()
    {
        \DB::table('users')
        ->where('id', @Auth::user()->id)
        ->update(['delete_status' => 1]);

        return redirect()->action('HomeController@index')->with('doneMessage', trans('backLang.addDone'));


    }

    public function givingProfile()
    {
        $givingProfile = \DB::table('users_quiz_result')
        ->where('user_id', @Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->select('year','id','invest_percent','integration_percent','institution_percent','impact_percent')
        ->get();

        $GetgivingProfile = \DB::table('users_quiz_result')
        ->where('user_id', @Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->select('year','id','invest_percent','integration_percent','institution_percent','impact_percent')
        ->get();

        return view("frontEnd.users.givingprofile", compact("givingProfile","GetgivingProfile"));

    }


    public function GetgivingProfile(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
        ]);


        $givingProfile = \DB::table('users_quiz_result')
        ->where('user_id', @Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->select('year','id','invest_percent','integration_percent','institution_percent','impact_percent')
        ->get();

        $GetgivingProfile = \DB::table('users_quiz_result')
        ->where('user_id', @Auth::user()->id)
        ->where('id', $request->id)
        ->select('year','id','invest_percent','integration_percent','institution_percent','impact_percent')
        ->get();


        return view("frontEnd.users.givingprofile", compact("givingProfile","GetgivingProfile"));

    }
    

    public function userBookmarked()
    {
        $BookmarkedEvent = \DB::table('events')
        ->where('user_id', @Auth::user()->id)
        ->select('id','title')
        ->get();

        $BookmarkedResources = \DB::table('resources')
        ->where('user_id', @Auth::user()->id)
        ->select('id','title')
        ->get();

        $BookmarkedStories = \DB::table('stories')
        ->where('user_id', @Auth::user()->id)
        ->select('id','title')
        ->get();


        return view("frontEnd.users.bookmarked", compact("BookmarkedEvent","BookmarkedResources","BookmarkedStories"));

    }

}
