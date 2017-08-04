<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests;
use App\WebmasterBanner;
use App\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use App\Permissions;
use Carbon\Carbon;
use Redirect;

class ResourcesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,8) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }

    }


    public function index()
    {

        $Resources = \DB::table('resources')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,8);
        return view("backEnd.resources", compact("Resources","CheckLayoutPermission"));

    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,8) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to create Resources Module');
        }

        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Resources_topic = \DB::table('resources_topic')->where('delete_status', 0)->get();

        return view("backEnd.resources.create", compact("Tags","Resources_topic"));
    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,8) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Resources Module');
        }
        //if (@Auth::user()->permissionsGroup->view_status) {
            //$Company = User::where('created_by', '=', Auth::user()->id)->find($id);
        $Resources = \DB::table('resources')->where('id', $id)->get();

       // } else {
         //   $Events = \DB::table('events')->where('id', $id)->get();
       // }

        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Resources_topic = \DB::table('resources_topic')->where('delete_status', 0)->get();

        if (count($Resources) > 0) {
            return view("backEnd.resources.edit", compact("Resources","Tags","Resources_topic"));
        } else {
            return redirect()->action('ResourcesController@index');
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'resources_summary' => 'required',
            'category_type' => 'required',
            'featured_image' => 'required',
            'tags' => 'required',
            'pdf_name' => 'required',
            'Resources_topic' => 'required'
        ]);

        $Tag_array =array();
        $image_name = array();

        foreach($request->file as $key=>$value)
        {
            $file = array('image' => $request->file[$key]);
            $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator = \Validator::make($file, $rules);
            if ($validator->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image '); 
                return redirect()->action('EventsController@create')->with('doneMessage', 'Upload Failed, Check Extension');
            }
            else {
                if ($request->file[$key]->isValid()) {
                    $destinationPath = 'uploads/resources'; // upload path
                    $extension = $request->file[$key]->getClientOriginalExtension();
                    $original_name = $request->file[$key]->getClientOriginalName();;
                    $fileName = $original_name; // renameing image
                    $request->file[$key]->move($destinationPath, $fileName);
                    $security_code = null;
                   
                    $image_name = $_FILES['file']['name'];


                }
                else {
                    return redirect()->action('ResourcesController@create')->with('doneMessage', 'NOt a valid Image');

                }
            }
        }

        $resources_pdf = array('image' => $request->resources_file);
        $rules1 = array('image' => 'required|mimes:pdf|max:10000');
        $validator1 = \Validator::make($resources_pdf, $rules1);
        if ($validator1->fails()) {

            \Session::flash('success', 'Upload Failed Not a valid PDF file '); 
            return redirect()->action('ResourcesController@create')->with('doneMessage', 'PDF Upload failed, check extension');
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if ($request->resources_file->isValid()) {
                $destinationPath = 'uploads/resources/pdf'; // upload path
                $extension = $request->resources_file->getClientOriginalExtension();
                $original_name = $request->resources_file->getClientOriginalName();
                $fileName = $original_name; // renameing image
                $request->resources_file->move($destinationPath, $fileName);

            }
            else {
                return redirect()->action('ResourcesController@create')->with('doneMessage', 'Uploaded PDF file is not valid');

            }
        }

        $resources_id = \DB::table('resources')->insertGetId(
            ['title' => $request->title,'one_liner' => $request->one_liner,'contents'=>$request->resources_summary,'type'=>$request->category_type,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'pdf_name'=>$request->pdf_name,'tags'=>serialize($request->tags),'topics'=>serialize($request->Resources_topic),'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Resource Created Successfully'); 
        return redirect()->action('ResourcesController@index')->with('doneMessage', trans('backLang.addDone'));

    }

    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $guest_image_name = array();
        $Resources = \DB::table('resources')->where('id', $id)->get();
        $security_code = null;
        $guest_photo_details = array();

        if(empty($request->file)){
            $image_name = unserialize($Resources[0]->images_array);

        }else{

            foreach($request->file as $key=>$value)
            {
                    $file = array('image' => $request->file[$key]);
                    $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator = \Validator::make($file, $rules);
                    if ($validator->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('ResourcesController@index')->with('doneMessage', 'Image Upload failed check extension');
                        // send back to the page with the input data and errors
                        //return Redirect::to('upload')->withInput()->withErrors($validator);
                    }
                    else {
                        if ($request->file[$key]->isValid()) {
                            $destinationPath = 'uploads/events'; // upload path
                            $extension = $request->file[$key]->getClientOriginalExtension();
                            $original_name = $request->file[$key]->getClientOriginalName();;
                            $fileName = $original_name.'.'.$extension; // renameing image
                            $request->file[$key]->move($destinationPath, $fileName);
                            
                            $security_code = null;
                            $image_name = $_FILES['file']['name'];


                        }
                        else {
                            return redirect()->action('EventsController@create')->with('doneMessage', 'NOt a valid Image');

                        }
                }
            }

            foreach(unserialize($Resources[0]->images_array) as $value1)
            {
                $image_name[] = $value1;
            }

        }

         if(empty($request->resources_file)){

            $resources_id = \DB::table('resources')->where('id', $id)->update(
             ['title' => $request->title,'one_liner' => $request->one_liner,'contents'=>$request->resources_summary,'type'=>$request->category_type,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'tags'=>serialize($request->tags),'topics'=>serialize($request->Resources_topic),'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );


         }else{

            $resources_pdf = array('image' => $request->resources_file);
            $rules1 = array('image' => 'required|mimes:pdf|max:10000');
            $validator1 = \Validator::make($resources_pdf, $rules1);
            if ($validator1->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid PDF file '); 
                return redirect()->action('ResourcesController@create')->with('doneMessage', 'PDF Upload failed, check extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->resources_file->isValid()) {
                    $destinationPath = 'uploads/resources/pdf'; // upload path
                    $extension = $request->resources_file->getClientOriginalExtension();
                    $original_name = $request->resources_file->getClientOriginalName();
                    $fileName = $original_name; // renameing image
                    $request->resources_file->move($destinationPath, $fileName);

                }
                else {
                    return redirect()->action('ResourcesController@create')->with('doneMessage', 'Uploaded PDF file is not valid');

                }
            }

             $resources_id = \DB::table('resources')->where('id', $id)->update(
             ['title' => $request->title,'one_liner' => $request->one_liner,'contents'=>$request->resources_summary,'type'=>$request->category_type,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'pdf_name'=>$request->pdf_name,'tags'=>serialize($request->tags),'topics'=>serialize($request->Resources_topic),'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        }

        \Session::flash('success', 'Resources Created Successfully'); 
        return redirect()->action('ResourcesController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function AllTopic()
    {
        $Resources_Topics = \DB::table('resources_topic')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,8);

        return view("backEnd.resources.topic.all", compact("Resources_Topics","CheckLayoutPermission"));
    }

    public function createTopic()
    {
        return view("backEnd.resources.topic.create");
    }

    public function storeTopic(Request $request)
    {
        $topics_id = \DB::table('resources_topic')->insertGetId(
                ['title' => $request->title,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);

        \Session::flash('success', 'Resources Created Successfully'); 

        return redirect()->action('ResourcesController@index')->with('doneMessage', trans('backLang.addDone'));
    }
    
    public function editTopic($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,8) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Resources Module');
        }

        $Resources_Topic = \DB::table('resources_topic')->where('id', $id)->get();

        if (count($Resources_Topic) > 0) {
            return view("backEnd.resources.topic.edit", compact("Resources_Topic"));
        } else {
            return redirect()->action('ResourcesController@index');
        }
    }

    public function updateTopic(Request $request,$id){

        $Resources_Topic = \DB::table('resources_topic')->where('id', $id)->get();
       
        if (count($Resources_Topic) > 0) {

            \DB::table('resources_topic')
            ->where('id', $id)
            ->update(['title' => $request->title,'updated_at'=>Carbon::now()->toDateTimeString(),'updated_by'=>Auth::user()->id]);

            return redirect()->action('ResourcesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('ResourcesController@AllTopic');
        }
    }

    public function destroyTopic($id){

        if ($this->delete_permission(@Auth::user()->role_type_id,8) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Resources Module');
        }

        $ResourcesTopics = \DB::table('resources_topic')->where('id', $id)->get();
        if (count($ResourcesTopics) > 0) {

            \DB::table('resources_topic')
            ->where('id', $id)
            ->update(['delete_status' => 1]);


        return redirect()->action('ResourcesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        } else {
        return redirect()->action('ResourcesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        }

    }

    public function download($file_path,$file_name){


        $day = date("d")."-".date("m")."-".date("Y");
        $update_tracker = $this->updateTracker($day,"resource_downloaded");
        return $this->getDownload("resources/".$file_path,$file_name);

    }


}