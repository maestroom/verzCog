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

class TestimonialController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,11) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }
/*
        if (@Auth::user()->role_type_id !== 1 && @Auth::user()->role_type_id !== 2) {  
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }*/
    }


    public function index()
    {
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,11);
        $Testimonial = \DB::table('testimonial')->where('delete_status', 0)->get();
        return view("backEnd.testimonial", compact("Testimonial","CheckLayoutPermission"));

    }

    public function edit($id)
    {

        $Testimonial = \DB::table('testimonial')->where('id', $id)->get();
        if (count($Testimonial) > 0) {
            return view("backEnd.testimonial.edit", compact("Testimonial"));
        } else {
            return redirect()->action('TestimonialController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $guest_image_name = array();
        $Testimonial = \DB::table('testimonial')->where('id', $id)->get();
        $security_code = null;
        $guest_photo_details = array();

         if(empty($request->company_logo)){

            $resources_id = \DB::table('testimonial')->where('id', $id)->update(
             ['name' => $request->title,'contents'=>$request->contents,'company_link'=>$request->company_link,'video_link'=>$request->video_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );


         }else{

            $company_logo = array('image' => $request->company_logo);
            $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator1 = \Validator::make($company_logo, $rules1);
            if ($validator1->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image file '); 
                return redirect()->action('TestimonialController@create')->with('doneMessage', 'Logo Upload failed, check extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->company_logo->isValid()) {
                    $destinationPath = 'uploads/testimonial/logo'; // upload path
                    $extension = $request->company_logo->getClientOriginalExtension();
                    $original_name = $request->company_logo->getClientOriginalName();
                    $fileName = $original_name; // renameing image
                    $request->company_logo->move($destinationPath, $fileName);

                }
                else {
                    return redirect()->action('TestimonialController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

                }
            }

            $resources_id = \DB::table('testimonial')->where('id', $id)->update(
             ['name' => $request->title,'contents'=>$request->contents,'company_link'=>$request->company_link,'company_logo'=>$request->company_logo_photo,'video_link'=>$request->video_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        }

        \Session::flash('success', 'Testimonial Updated Successfully'); 
        return redirect()->action('TestimonialController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {

        return view("backEnd.testimonial.create");
    }

    public function store(Request $request)
    {

        //
        $this->validate($request, [
            'title' => 'required',
            'contents' => 'required',
            'company_logo' => 'required',
            'company_link' => 'required',
            'video_link' => 'required',

        ]);


        $company_logo = array('image' => $request->company_logo);
        $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
        $validator1 = \Validator::make($company_logo, $rules1);
        if ($validator1->fails()) {

            \Session::flash('success', 'Upload Failed Not a valid image file '); 
            return redirect()->action('TestimonialController@create')->with('doneMessage', 'Logo Upload failed, check extension');
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if ($request->company_logo->isValid()) {
                $destinationPath = 'uploads/testimonial/logo'; // upload path
                $extension = $request->company_logo->getClientOriginalExtension();
                $original_name = $request->company_logo->getClientOriginalName();
                $fileName = $original_name; // renameing image
                $request->company_logo->move($destinationPath, $fileName);

            }
            else {
                return redirect()->action('TestimonialController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

            }
        }

        \DB::table('testimonial')->insert(
            ['name' => $request->title,'contents'=>$request->contents,'company_link'=>$request->company_link,'company_logo'=>$request->company_logo_photo,'video_link'=>$request->video_link,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('TestimonialController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        $Company = \DB::table('testimonial')->where('id', $id)->get();
       
        if (count($Company) > 0) {

            \DB::table('testimonial')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('TestimonialController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('TestimonialController@index');
        }
    }



}