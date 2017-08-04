<?php

namespace App\Http\Controllers;

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

class PartnersController extends Controller
{

    public function __construct()
    {
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            $this->middleware('auth');
            if ($this->view_permission(@Auth::user()->role_type_id,9) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }

    }


    public function index()
    {

        $Partners = \DB::table('partners')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,9);
        return view("backEnd.partners", compact("Partners", "CheckLayoutPermission"));

    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,9) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Partners Module');
        }

        $Partners = \DB::table('partners')->where('id', $id)->get();

        if (count($Partners) > 0) {
            return view("backEnd.partners.edit", compact("Partners"));
        } else {
            return redirect()->action('PartnersController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $guest_image_name = array();
        $Partners = \DB::table('partners')->where('id', $id)->get();
        $security_code = null;
        $guest_photo_details = array();

         if(empty($request->company_logo)){

            $resources_id = \DB::table('partners')->where('id', $id)->update(
             ['name' => $request->title,'company_link'=>$request->company_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );


         }else{

            $company_logo = array('image' => $request->company_logo);
            $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator1 = \Validator::make($company_logo, $rules1);
            if ($validator1->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image file '); 
                return redirect()->action('PartnersController@create')->with('doneMessage', 'Logo Upload failed, check extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->company_logo->isValid()) {
                    $destinationPath = 'uploads/partners/logo'; // upload path
                    $extension = $request->company_logo->getClientOriginalExtension();
                    $original_name = $request->company_logo->getClientOriginalName();
                    $fileName = $original_name; // renameing image
                    $request->company_logo->move($destinationPath, $fileName);

                }
                else {
                    return redirect()->action('PartnersController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

                }
            }

            $resources_id = \DB::table('partners')->where('id', $id)->update(
             ['name' => $request->title,'company_link'=>$request->company_link,'company_logo'=>$request->company_logo_photo,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        }

        \Session::flash('success', 'Partners Updated Successfully'); 
        return redirect()->action('PartnersController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,9) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Partners Module');
        }

        return view("backEnd.partners.create");
    }

    public function store(Request $request)
    {

        //
        $this->validate($request, [
            'title' => 'required',
            'company_logo' => 'required',
            'company_link' => 'required',

        ]);


        $company_logo = array('image' => $request->company_logo);
        $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
        $validator1 = \Validator::make($company_logo, $rules1);
        if ($validator1->fails()) {

            \Session::flash('success', 'Upload Failed Not a valid image file '); 
            return redirect()->action('PartnersController@create')->with('doneMessage', 'Logo Upload failed, check extension');
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if ($request->company_logo->isValid()) {
                $destinationPath = 'uploads/partners/logo'; // upload path
                $extension = $request->company_logo->getClientOriginalExtension();
                $original_name = $request->company_logo->getClientOriginalName();
                $fileName = $original_name; // renameing image
                $request->company_logo->move($destinationPath, $fileName);

            }
            else {
                return redirect()->action('PartnersController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

            }
        }

        \DB::table('partners')->insert(
            ['name' => $request->title,'company_link'=>$request->company_link,'company_logo'=>$request->company_logo_photo,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('PartnersController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        $Company = \DB::table('partners')->where('id', $id)->get();
       
        if ($this->delete_permission(@Auth::user()->role_type_id,9) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Partners Module');
        }

        if (count($Company) > 0) {

            \DB::table('partners')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('PartnersController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('PartnersController@index');
        }
    }



}