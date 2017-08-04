<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

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

class TagsController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,4) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }
    }


    public function index()
    {

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,4);
        $Tags = \DB::table('tags')->where('status', 1)->get();
        return view("backEnd.tags", compact("Tags","CheckLayoutPermission"));

    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,4) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Tags Module');
        }
        $Tags = \DB::table('tags')->where('id', $id)->get();

        if (count($Tags) > 0) {
            return view("backEnd.tags.edit", compact("Tags"));
        } else {
            return redirect()->action('TagsController@index');
        }
    }


    public function update(Request $request, $id)
    {
        $Tags = \DB::table('tags')->where('id', $id)->get();
       
        if (count($Tags) > 0) {

            \DB::table('tags')
            ->where('id', $id)
            ->update(['name' => $request->name,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);

            return redirect()->action('TagsController@edit', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('TagsController@index');
        }
    }


    public function destroy($id)
    {
        if ($this->delete_permission(@Auth::user()->role_type_id,4) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Tags Module');
        }

        $Tags = \DB::table('tags')->where('id', $id)->get();
       
        if (count($Tags) > 0) {
            \DB::table('tags')
            ->where('id', $id)
            ->update(['status' => 0]);

            return redirect()->action('TagsController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('tagsController@index');
        }
    }

    public function create()
    {

        if ($this->create_permission(@Auth::user()->role_type_id,4) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Tags Module');
        }

        return view("backEnd.tags.create");
    }

    public function store(Request $request)
    {

    	$tag_array = explode(",",$request->tag_field);
    	foreach($tag_array as $key=>$value)
    	{

            try{

                \DB::table('tags')->insert(
                ['name' => $value,'status'=>$request->status,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
                );
            }
            catch(\Exception $exception)
            {
                $errormsg = 'Database error! ' . $exception->getCode();
            }


    	}
        /*\DB::table('tags')->insert(
            ['name' => $request->name,'domain'=>$request->domain,'created_at'=>Carbon::now()->toDateTimeString()]
        );*/

        return redirect()->action('TagsController@index')->with('doneMessage', trans('backLang.addDone'));
    }

}







/*namespace App\Http\Controllers;

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

class TagsController extends Controller
{

    private $uploadPath = "uploads/banners/";



    


}*/
