<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\WebmasterSection;
use Auth;
use File;
use Illuminate\Http\Request;
use App\Permissions;
use Carbon\Carbon;
use Input;

class FellowshipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,14) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,14);
        $Fellowship = \DB::table('fellowship')->where('delete_status', 0)->get();
        return view("backEnd.fellowship", compact("Fellowship", "CheckLayoutPermission"));

    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,14) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Fellowship Module');
        }

        return view("backEnd.fellowship.create");
    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,14) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Fellowship Module');
        }

        $Fellowship = \DB::table('fellowship')->where('id', $id)->get();

        if (count($Fellowship) > 0) {
            return view("backEnd.fellowship.edit", compact("Fellowship"));
        } else {
            return redirect()->action('FellowshipController@index');
        }
    }


    public function store(Request $request)
    {

        $guest_photo_details = array();

         $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'title' => 'required',
            'contents' => 'required',
            'featured_image' => 'required',
            'fellowship_location' => 'required',
        ]);
        $image_name = array();
        foreach($request->file as $key=>$value)
        {
            $file = array('image' => $request->file[$key]);
            $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator = \Validator::make($file, $rules);
            if ($validator->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image '); 
                return redirect()->action('FellowshipController@create')->with('doneMessage', 'Upload required Images, Check Extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->file[$key]->isValid()) {
                    $destinationPath = 'uploads/fellowship'; // upload path
                    $extension = $request->file[$key]->getClientOriginalExtension();
                    $original_name = $request->file[$key]->getClientOriginalName();;
                    $fileName = $original_name; // renameing image
                    $request->file[$key]->move($destinationPath, $fileName);
                    
                   
                    $image_name = $_FILES['file']['name'];


                }
                else {
                    return redirect()->action('FellowshipController@create')->with('doneMessage', 'NOt a valid Image');

                }
            }
        }



        $fellowship_id = \DB::table('fellowship')->insertGetId(
            ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'location'=>$request->fellowship_location,'registration_cutoff_date'=>$request->registration_cutoff_date,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Fellowship Created Successfully'); 
        return redirect()->action('FellowshipController@index')->with('doneMessage', 'Fellowship created Successfully');

    }
    public function update(Request $request, $id)
    {

        $image_name = array();
        $Fellowship = \DB::table('fellowship')->where('id', $id)->get();
        $guest_photo_details = array();

        if(empty($request->file)){
            $image_name = unserialize($Fellowship[0]->images_array);

        }else{

            foreach($request->file as $key=>$value)
            {
                    $file = array('image' => $request->file[$key]);
                    $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator = \Validator::make($file, $rules);
                    if ($validator->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('FellowshipController@create')->with('doneMessage', 'Image Upload failed check extension');
                        // send back to the page with the input data and errors
                        //return Redirect::to('upload')->withInput()->withErrors($validator);
                    }
                    else {
                        if ($request->file[$key]->isValid()) {
                            $destinationPath = 'uploads/fellowship'; // upload path
                            $extension = $request->file[$key]->getClientOriginalExtension();
                            $original_name = $request->file[$key]->getClientOriginalName();;
                            $fileName = $original_name.'.'.$extension; // renameing image
                            $request->file[$key]->move($destinationPath, $fileName);
                            
                            $security_code = null;
                            $image_name = $_FILES['file']['name'];


                        }
                        else {
                            return redirect()->action('FellowshipController@create')->with('doneMessage', 'NOt a valid Image');

                        }
                }
            }

            foreach(unserialize($Fellowship[0]->images_array) as $value1)
            {
                $image_name[] = $value1;
            }

        }


        $fellowship_id = \DB::table('fellowship')->where('id', $id)->update(
            ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'images_array'=>serialize(array_unique($image_name)),'featured_image'=>$request->featured_image,'location'=>$request->fellowship_location,'registration_cutoff_date'=>$request->registration_cutoff_date,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );  

        \Session::flash('success', 'Fellowship Created Successfully'); 
        return redirect()->action('FellowshipController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,14) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Fellowship Module');
        }

        $Fellowship = \DB::table('fellowship')->where('id', $id)->get();
       
        if (count($Fellowship) > 0) {

            \DB::table('fellowship')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('FellowshipController@index', $id)->with('doneMessage', "Fellowship deleted Successfully");
        } else {
            return redirect()->action('FellowshipController@index');
        }
    }




}
