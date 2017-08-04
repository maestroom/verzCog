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

class Championshipcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,15) === 0) {  

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

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,15);
        $Championship = \DB::table('championship')->where('delete_status', 0)->get();
        return view("backEnd.championship", compact("Championship", "CheckLayoutPermission"));

    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,15) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Championship Module');
        }

        return view("backEnd.championship.create");
    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,15) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Championship Module');
        }

        $Championship = \DB::table('championship')->where('id', $id)->get();

        if (count($Championship) > 0) {
            return view("backEnd.championship.edit", compact("Championship"));
        } else {
            return redirect()->action('ChampionshipController@index');
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
            'championship_location' => 'required',
        ]);
        $image_name = array();
        foreach($request->file as $key=>$value)
        {
            $file = array('image' => $request->file[$key]);
            $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator = \Validator::make($file, $rules);
            if ($validator->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image '); 
                return redirect()->action('ChampionshipController@create')->with('doneMessage', 'Upload required Images, Check Extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->file[$key]->isValid()) {
                    $destinationPath = 'uploads/championship'; // upload path
                    $extension = $request->file[$key]->getClientOriginalExtension();
                    $original_name = $request->file[$key]->getClientOriginalName();;
                    $fileName = $original_name; // renameing image
                    $request->file[$key]->move($destinationPath, $fileName);
                    
                   
                    $image_name = $_FILES['file']['name'];


                }
                else {
                    return redirect()->action('ChampionshipController@create')->with('doneMessage', 'NOt a valid Image');

                }
            }
        }



        $championship_id = \DB::table('championship')->insertGetId(
            ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'location'=>$request->championship_location,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Championship Created Successfully'); 
        return redirect()->action('ChampionshipController@index')->with('doneMessage', 'Championship created Successfully');

    }
    public function update(Request $request, $id)
    {

        $image_name = array();
        $Championship = \DB::table('championship')->where('id', $id)->get();
        $guest_photo_details = array();

        if(empty($request->file)){
            $image_name = unserialize($Championship[0]->images_array);

        }else{

            foreach($request->file as $key=>$value)
            {
                    $file = array('image' => $request->file[$key]);
                    $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator = \Validator::make($file, $rules);
                    if ($validator->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('ChampionshipController@create')->with('doneMessage', 'Image Upload failed check extension');
                        // send back to the page with the input data and errors
                        //return Redirect::to('upload')->withInput()->withErrors($validator);
                    }
                    else {
                        if ($request->file[$key]->isValid()) {
                            $destinationPath = 'uploads/championship'; // upload path
                            $extension = $request->file[$key]->getClientOriginalExtension();
                            $original_name = $request->file[$key]->getClientOriginalName();;
                            $fileName = $original_name.'.'.$extension; // renameing image
                            $request->file[$key]->move($destinationPath, $fileName);
                            
                            $security_code = null;
                            $image_name = $_FILES['file']['name'];


                        }
                        else {
                            return redirect()->action('ChampionshipController@create')->with('doneMessage', 'NOt a valid Image');

                        }
                }
            }

            foreach(unserialize($Championship[0]->images_array) as $value1)
            {
                $image_name[] = $value1;
            }

        }


        $championship_id = \DB::table('championship')->where('id', $id)->update(
            ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'images_array'=>serialize(array_unique($image_name)),'featured_image'=>$request->featured_image,'location'=>$request->championship_location,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );  

        \Session::flash('success', 'Championship Created Successfully'); 
        return redirect()->action('ChampionshipController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,15) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Championship Module');
        }

        $Championship = \DB::table('championship')->where('id', $id)->get();
       
        if (count($Championship) > 0) {

            \DB::table('championship')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('ChampionshipController@index', $id)->with('doneMessage', "Championship deleted Successfully");
        } else {
            return redirect()->action('ChampionshipController@index');
        }
    }




}
