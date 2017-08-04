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

class StoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,13) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }

    }


    public function index()
    {




        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,13);

       // $Stories = \DB::table('stories')->where('delete_status', 0)->get();


        $Stories = \DB::table('stories')
        ->join('users', 'stories.story_by', '=', 'users.id')
        ->where('stories.delete_status', 0)
        ->select('stories.*','users.name as user_name')->get();

        return view("backEnd.stories", compact("Stories","CheckLayoutPermission"));

    }

    public function users()
    {

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,13);

        $UserStories = \DB::table('user_stories')->where('delete_status', 0)->get();
        return view("backEnd.stories.users", compact("UserStories","CheckLayoutPermission"));

    }


    public function create()
    {

        if ($this->create_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Stories Module');
        }

        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Stories_topic = \DB::table('stories_topic')->where('delete_status', 0)->get();
        return view("backEnd.stories.create", compact("Tags","Stories_topic"));
    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Stories Module');
        }

        $Stories = \DB::table('stories')->where('id', $id)->get();
        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Stories_topic = \DB::table('stories_topic')->where('delete_status', 0)->get();

        if (count($Stories) > 0) {
            return view("backEnd.stories.edit", compact("Stories","Tags","Stories_topic"));
        } else {
            return redirect()->action('StoriesController@index');
        }
    }

    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Stories Module');
        }

        $Stories = \DB::table('stories')->where('id', $id)->get();
       
        if (count($Stories) > 0) {

            \DB::table('stories')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('StoriesController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('StoriesController@index');
        }
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'stories_contents' => 'required',
            'featured_image' => 'required',
            'tags' => 'required',
            'Stories_topic' => 'required'
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
                return redirect()->action('StoriesController@create')->with('doneMessage', 'Upload Failed, Check Extension');
            }
            else {
                if ($request->file[$key]->isValid()) {
                    $destinationPath = 'uploads/stories'; // upload path
                    $extension = $request->file[$key]->getClientOriginalExtension();
                    $original_name = $request->file[$key]->getClientOriginalName();;
                    $fileName = $original_name; // renameing image
                    $request->file[$key]->move($destinationPath, $fileName);
                    $security_code = null;
                   
                    $image_name = $_FILES['file']['name'];


                }
                else {
                    return redirect()->action('StoriesController@create')->with('doneMessage', 'NOt a valid Image');

                }
            }
        }


        $stories_id = \DB::table('stories')->insertGetId(
            ['title' => $request->title,'story_by' => $request->story_by,'contents'=>$request->stories_contents,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'tags'=>serialize($request->tags),'topics'=>serialize($request->Stories_topic),'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Story Created Successfully'); 
        return redirect()->action('StoriesController@index')->with('doneMessage', trans('backLang.addDone'));

    }

    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $Stories = \DB::table('stories')->where('id', $id)->get();

        if(empty($request->file)){
            $image_name = unserialize($Stories[0]->images_array);

        }else{

            foreach($request->file as $key=>$value)
            {
                    $file = array('image' => $request->file[$key]);
                    $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator = \Validator::make($file, $rules);
                    if ($validator->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('StoriesController@index')->with('doneMessage', 'Image Upload failed check extension');
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
                            return redirect()->action('StoriesController@create')->with('doneMessage', 'NOt a valid Image');

                        }
                }
            }

            foreach(unserialize($Stories[0]->images_array) as $value1)
            {
                $image_name[] = $value1;
            }

        }

         if(empty($request->stories_file)){

            $stories_id = \DB::table('stories')->where('id', $id)->update(
             ['title' => $request->title,'contents'=>$request->stories_contents,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'tags'=>serialize($request->tags),'topics'=>serialize($request->Stories_topic),'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );


         }

        \Session::flash('success', 'Stories Updated Successfully'); 
        return redirect()->action('StoriesController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function AllTopic()
    {
        $Stories_Topics = \DB::table('stories_topic')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,13);

        return view("backEnd.stories.topic.all", compact("Stories_Topics","CheckLayoutPermission"));
    }

    public function createTopic()
    {        
        if ($this->create_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to create Stories topic Module');
        }
        return view("backEnd.stories.topic.create");
    }

    public function storeTopic(Request $request)
    {
        $topics_id = \DB::table('stories_topic')->insertGetId(
                ['title' => $request->title,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);

        \Session::flash('success', 'Stories Created Successfully'); 

        return redirect()->action('StoriesController@AllTopic')->with('doneMessage', trans('backLang.addDone'));
    }
    
    public function editTopic($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to edit Stories topic Module');
        }

        $Stories_Topic = \DB::table('stories_topic')->where('id', $id)->get();
        if (count($Stories_Topic) > 0) {
            return view("backEnd.stories.topic.edit", compact("Stories_Topic"));
        } else {
            return redirect()->action('StoriesController@index');
        }
    }

    public function updateTopic(Request $request,$id){

        $Stories_Topic = \DB::table('stories_topic')->where('id', $id)->get();
       
        if (count($Stories_Topic) > 0) {

            \DB::table('stories_topic')
            ->where('id', $id)
            ->update(['title' => $request->title,'updated_at'=>Carbon::now()->toDateTimeString(),'updated_by'=>Auth::user()->id]);

            return redirect()->action('StoriesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('StoriesController@AllTopic');
        }
    }

    public function destroyTopic($id){

        if ($this->delete_permission(@Auth::user()->role_type_id,13) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to delete Stories topic Module');
        }

        $StoriesTopics = \DB::table('stories_topic')->where('id', $id)->get();
        if (count($StoriesTopics) > 0) {

            \DB::table('stories_topic')
            ->where('id', $id)
            ->update(['delete_status' => 1]);


        return redirect()->action('StoriesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        } else {
        return redirect()->action('StoriesController@AllTopic')->with('doneMessage', trans('backLang.saveDone'));
        }

    }


}