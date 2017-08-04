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

class BannersController extends Controller
{
    // Define Default Variables
    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,12) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }

    }

   public function index()
    {

        $Banners = \DB::table('banners')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,12);
        return view("backEnd.banners", compact("Banners", "CheckLayoutPermission"));

    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,12) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Banners Module');
        }

        $Banners = \DB::table('banners')->where('id', $id)->get();

        if (count($Banners) > 0) {
            return view("backEnd.banners.edit", compact("Banners"));
        } else {
            return redirect()->action('BannersController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $guest_image_name = array();
        $Banners = \DB::table('banners')->where('id', $id)->get();

         if(empty($request->banner_image)){

            $resources_id = \DB::table('banners')->where('id', $id)->update(
             ['name' => $request->title,'banner_link'=>$request->banner_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );


         }else{

            $banner_image = array('image' => $request->banner_image);
            $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator1 = \Validator::make($banner_image, $rules1);
            if ($validator1->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image file '); 
                return redirect()->action('BannersController@create')->with('doneMessage', 'Logo Upload failed, check extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->banner_image->isValid()) {
                    $destinationPath = 'uploads/banners/image'; // upload path
                    $extension = $request->banner_image->getClientOriginalExtension();
                    $original_name = $request->banner_image->getClientOriginalName();
                    $fileName = $original_name; // renameing image
                    $request->banner_image->move($destinationPath, $fileName);

                }
                else {
                    return redirect()->action('BannersController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

                }
            }

            $resources_id = \DB::table('banners')->where('id', $id)->update(
             ['name' => $request->title,'banner_link'=>$request->banner_link,'banner_image'=>$request->banner_photo,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        }

        \Session::flash('success', 'Banners Updated Successfully'); 
        return redirect()->action('BannersController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,12) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Banners Module');
        }

        return view("backEnd.banners.create");
    }

    public function store(Request $request)
    {

        //
        $this->validate($request, [
            'title' => 'required',
            'banner_image' => 'required',
            'banner_link' => 'required',

        ]);


        $banner_image = array('image' => $request->banner_image);
        $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
        $validator1 = \Validator::make($banner_image, $rules1);
        if ($validator1->fails()) {

            \Session::flash('success', 'Upload Failed Not a valid image file '); 
            return redirect()->action('BannersController@create')->with('doneMessage', 'Logo Upload failed, check extension');
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if ($request->banner_image->isValid()) {
                $destinationPath = 'uploads/banners/image'; // upload path
                $extension = $request->banner_image->getClientOriginalExtension();
                $original_name = $request->banner_image->getClientOriginalName();
                $fileName = $original_name; // renameing image
                $request->banner_image->move($destinationPath, $fileName);

            }
            else {
                return redirect()->action('BannersController@create')->with('doneMessage', 'Uploaded Image is not valid file is not valid');

            }
        }

        \DB::table('banners')->insert(
            ['name' => $request->title,'banner_link'=>$request->banner_link,'banner_image'=>$request->banner_photo,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('BannersController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        $Banner = \DB::table('banners')->where('id', $id)->get();
       
        if ($this->delete_permission(@Auth::user()->role_type_id,12) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Banners Module');
        }

        if (count($Banner) > 0) {

            \DB::table('banners')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('BannersController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('BannersController@index');
        }
    }


}