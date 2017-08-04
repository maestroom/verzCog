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

class GetinvolvedFrontController extends Controller
{

    public function __construct()
    {
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }
        
    }

    public function index()
    {

        $Getinvolved = \DB::table('getinvolved')->get();
        return view("frontEnd.getinvolved", compact("Getinvolved"));

    }

    public function create()
    {

        return view("frontEnd.getinvolved.create");

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'message' => 'required',
            'company_logo' => 'required',
            'title' => 'required'
            //'email'=>   'required|email|unique:users,email,'.@Auth::user()->id

        ]);


        $company_logo = array('image' => $request->company_logo);
        $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
        $validator1 = \Validator::make($company_logo, $rules1);
        if ($validator1->fails()) {

            \Session::flash('success', 'Upload Failed Not a valid image file '); 
            return redirect()->action('GetinvolvedFrontController@create')->with('doneMessage', 'Logo Upload failed, check extension');
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if ($request->company_logo->isValid()) {
                $destinationPath = 'uploads/getinvolved/logo'; // upload path
                $extension = $request->company_logo->getClientOriginalExtension();
                $original_name = $request->company_logo->getClientOriginalName();
                $fileName = $original_name; // renameing image
                $request->company_logo->move($destinationPath, $fileName);

            }
            else {
                return redirect()->action('GetinvolvedFrontController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

            }
        }



        $InsertGetinvolved = \DB::table('getinvolved')->insert(['user_id' => Auth::user()->id,'start_date' => $request->start_date,'end_date' => $request->end_date,'company_logo'=>$request->company_logo_photo,'title'=>$request->title,'message'=>$request->message,'created_at'=>Carbon::now()->toDateTimeString()]);


        return redirect()->action('GetinvolvedFrontController@index')->with('doneMessage', 'Your Post has been submitted');

    }

}



