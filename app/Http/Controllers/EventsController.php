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

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,3) === 0) {  

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

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,3);
        $Events = \DB::table('events')->where('delete_status', 0)->get();
        return view("backEnd.events", compact("Events", "CheckLayoutPermission"));

    }

    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Events Module');
        }

        $Events = \DB::table('events')->where('id', $id)->get();
        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Topics = \DB::table('events_topic')->where('delete_status', 1)->get();
        $Events_guest = \DB::table('events_guest')->where('events_id', $id)->get();

        if (count($Events) > 0) {
            return view("backEnd.events.edit", compact("Events","Tags","Topics","Events_guest"));
        } else {
            return redirect()->action('EventsController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $image_name = array();
        $Tag_array =array();
        $guest_image_name = array();
        $Events = \DB::table('events')->where('id', $id)->get();
        $security_code = null;
        $event_url = null;


        $guest_photo_details = array();

        if(empty($request->file)){
            $image_name = unserialize($Events[0]->images_array);

        }else{

            foreach($request->file as $key=>$value)
            {
                    $file = array('image' => $request->file[$key]);
                    $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator = \Validator::make($file, $rules);
                    if ($validator->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('EventsController@create')->with('doneMessage', 'Image Upload failed check extension');
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

            foreach(unserialize($Events[0]->images_array) as $value1)
            {
                $image_name[] = $value1;
            }

        }
        if(isset($request->guest))
        {
            foreach($request->guest as $key=>$value)
            {
                if (array_key_exists("photo",$request->guest[$key]))
                {
                    //print_R($value['photo']);

                    $guest_photo = array('image' => $value['photo']);
                    $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
                    $validator1 = \Validator::make($guest_photo, $rules1);
                    if ($validator1->fails()) {

                        \Session::flash('success', 'Upload Failed Not a valid image '); 
                        return redirect()->action('EventsController@create')->with('doneMessage', 'Image Upload failed check extension');
                        // send back to the page with the input data and errors
                        //return Redirect::to('upload')->withInput()->withErrors($validator);
                    }
                    else {
                        if ($value['photo']->isValid()) {
                            $destinationPath = 'uploads/events/guest'; // upload path
                            $extension = $value['photo']->getClientOriginalExtension();
                            $original_name = $value['photo']->getClientOriginalName();;
                            $fileName = $original_name; // renameing image
                            $value['photo']->move($destinationPath, $fileName);

                        }
                        else {
                            return redirect()->action('EventsController@create')->with('doneMessage', 'Guest pic is NOt a valid Image');

                        }
                    }
                }

                $Events_guest = \DB::table('events_guest')->where([
                                ['events_id', $id],
                                ['name', $value['name']],
                                ['designation', $value['designation']],
                                ['comments', $value['details']]
                            ])->get();


                if(count($Events_guest)==0)
                {


//echo "insert".$value['photo_name'];echo "<br>";
                        $Insert_event_guest_id = \DB::table('events_guest')->insertGetId(
                            ['name' => $value['name'],'events_id'=>$id,'designation'=>$value['designation'],'comments'=>$value['details'],'photo'=>$value['photo_name'],'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
                        );

                }else{
                    //echo "update".$value['photo_name'];echo "<br>";

                        $update_event_guest_id = \DB::table('events_guest')->where('events_id', $id)->update(['name' => $value['name'],'designation'=>$value['designation'],'comments'=>$value['details'],'photo'=>$value['photo_name'],'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
                        );
                }

            }
        }





        if($request->event_type==1)
        {
            $security_code = $request->security_code;
        }
        if($request->event_type==0)
        {
            $event_url = $request->event_url;
        }

            $Tag_array = serialize($image_name);

            $event_id = \DB::table('events')->where('id', $id)->update(
                ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'type'=>$request->event_type,'images_array'=>serialize(array_unique($image_name)),'featured_image'=>$request->featured_image,'location'=>$request->event_location,'max_attendees'=>$request->max_attendees,'max_waiting_list'=>$request->max_waiting_list,'tags'=>serialize($request->tags),'topics'=>serialize($request->Events_topic),'status'=>$request->status,'event_url'=>$event_url,'security_code'=>$security_code,'chargeble'=>$request->chargeble,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
            );

        

        \Session::flash('success', 'Events Created Successfully'); 
        return redirect()->action('EventsController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Events Module');
        }

        $Events = \DB::table('events')->where('id', $id)->get();
       
        if (count($Events) > 0) {

            \DB::table('events')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('EventsController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('EventsController@index');
        }
    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Events Module');
        }

        $Tags = \DB::table('tags')->where('status', 1)->get();
        $Events_topic = \DB::table('events_topic')->where('delete_status', 1)->get();
        return view("backEnd.events.create", compact("Tags","Events_topic"));
    }

    public function store(Request $request)
    {

        $guest_photo_details = array();

         $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'title' => 'required',
            'contents' => 'required',
            'event_type' => 'required',
            'featured_image' => 'required',
            'event_location' => 'required',
            'tags' => 'required',
            'Events_topic' => 'required',
            'status' => 'required',
            'max_attendees'=>'required',
            'max_waiting_list'=>'required'
        ]);
         $event_url = null;
         $security_code = null;


        $Tag_array =array();
        $image_name = array();
        foreach($request->file as $key=>$value)
        {
            $file = array('image' => $request->file[$key]);
            $rules = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator = \Validator::make($file, $rules);
            if ($validator->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image '); 
                return redirect()->action('EventsController@create')->with('doneMessage', 'Upload required Images, Check Extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->file[$key]->isValid()) {
                    $destinationPath = 'uploads/events'; // upload path
                    $extension = $request->file[$key]->getClientOriginalExtension();
                    $original_name = $request->file[$key]->getClientOriginalName();;
                    $fileName = $original_name; // renameing image
                    $request->file[$key]->move($destinationPath, $fileName);
                    
                   
                    $image_name = $_FILES['file']['name'];


                }
                else {
                    return redirect()->action('EventsController@create')->with('doneMessage', 'NOt a valid Image');

                }
            }
        }

        foreach($request->guest as  $key=>$value){

            $guest_photo = array('image' => $request->guest[$key]['photo']);
            $rules1 = array('image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator1 = \Validator::make($guest_photo, $rules1);
            if ($validator1->fails()) {

                \Session::flash('success', 'Upload Failed Not a valid image '); 
                return redirect()->action('EventsController@create')->with('doneMessage', 'Image Upload failed check extension');
                // send back to the page with the input data and errors
                //return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                if ($request->guest[$key]['photo']->isValid()) {
                    $destinationPath = 'uploads/events/guest'; // upload path
                    $extension = $request->guest[$key]['photo']->getClientOriginalExtension();
                    $original_name = $request->guest[$key]['photo']->getClientOriginalName();
                    $fileName = $original_name; // renameing image
                    $request->guest[$key]['photo']->move($destinationPath, $fileName);
                   
                    $security_code = null;
                    //print_R($request->guest[$key]['photo']->getClientOriginalName());
/*                    foreach($request->guest[$key]['photo'] as $key1=>$value1)
                    {
                        echo $value1;
                        //$guest_image_name = $value['name'];
                    }*/

                }
                else {
                    return redirect()->action('EventsController@create')->with('doneMessage', 'Guest pic is NOt a valid Image');

                }
            }


        }

       if($request->event_type==1)
        {
            $security_code = $request->security_code;
        }
        if($request->event_type==0)
        {
            $event_url = $request->event_url;
        }

            $Tag_array = serialize($image_name);

            $event_id = \DB::table('events')->insertGetId(
                ['start_date' => $request->start_date,'end_date'=>$request->end_date,'title' => $request->title,'contents'=>$request->contents,'type'=>$request->event_type,'images_array'=>serialize($image_name),'featured_image'=>$request->featured_image,'location'=>$request->event_location,'max_attendees'=>$request->max_attendees,'max_waiting_list'=>$request->max_waiting_list,'tags'=>serialize($request->tags),'topics'=>serialize($request->Events_topic),'status'=>$request->status,'event_url'=>$event_url,'security_code'=>$security_code,'chargeble'=>$request->chargeble,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
            );

        foreach($request->guest as $key2=>$value2)
        {
            $event_guest_id = \DB::table('events_guest')->insertGetId(
                ['name' => $request->guest[$key2]['name'],'events_id'=>$event_id,'designation'=>$request->guest[$key2]['designation'],'comments'=>$request->guest[$key2]['details'],'photo'=>$request->guest[$key2]['photo_name'],'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
            );

        }

        \Session::flash('success', 'Events Created Successfully'); 
        return redirect()->action('EventsController@index')->with('doneMessage', trans('backLang.addDone'));

    }

    public function AllTopic()
    {
        $Events_Topics = \DB::table('events_topic')->where('delete_status', 0)->get();
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,3);
        return view("backEnd.events.topic.all", compact("Events_Topics","CheckLayoutPermission"));
    }

    public function createTopic()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Events Module');
        }
        return view("backEnd.events.topic.create");
    }

    public function storeTopic(Request $request)
    {
        $topics_id = \DB::table('events_topic')->insertGetId(
                ['title' => $request->title,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);

        \Session::flash('success', 'Events Created Successfully'); 

        return redirect()->action('EventsController@index')->with('doneMessage', trans('backLang.addDone'));
    }
    
    public function editTopic($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Events Module');
        }

        $Events_Topic = \DB::table('events_topic')->where('id', $id)->get();

        if (count($Events_Topic) > 0) {
            return view("backEnd.events.topic.edit", compact("Events_Topic"));
        } else {
            return redirect()->action('EventsController@index');
        }
    }

    public function updateTopic(Request $request,$id){

        $Events_Topic = \DB::table('events_topic')->where('id', $id)->get();
       
        if (count($Events_Topic) > 0) {

            \DB::table('events_topic')
            ->where('id', $id)
            ->update(['title' => $request->title,'updated_at'=>Carbon::now()->toDateTimeString(),'updated_by'=>Auth::user()->id]);

            return redirect()->action('EventsController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('EventsController@index');
        }
    }

    public function destroyTopic($id){

        if ($this->delete_permission(@Auth::user()->role_type_id,3) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Events Module');
        }


        $EventsTopics = \DB::table('events_topic')->where('id', $id)->get();
        if (count($EventsTopics) > 0) {

            \DB::table('events_topic')
            ->where('id', $id)
            ->update(['delete_status' => 1]);


        return redirect()->action('EventsController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
        return redirect()->action('EventsController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        }

    }


}
