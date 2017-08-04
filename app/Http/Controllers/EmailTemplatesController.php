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


class EmailTemplatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,7) === 0) {  

                return \Redirect::to(route('NoPermission'))->send();
                //return redirect()->back()->with('doneMessage', 'You dont have Permission to View Founders Module');
            }
        }
/*        if (@Auth::user()->role_type_id !== 1 && @Auth::user()->role_type_id !== 2) {  
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }*/
    }

    public function index()
    {

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,7);
       // $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        if ($this->view_permission(@Auth::user()->role_type_id,7) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to View Emailtemplates Module');
        }

        $Emailtemplate = \DB::table('emailtemplates')->where('delete_status', 0)->get();
        return view("backEnd.emailtemplates", compact("Emailtemplate","CheckLayoutPermission"));

    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,7) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Emailtemplates Module');
        }

        $Emailtemplate = \DB::table('emailtemplates')->where('id', $id)->get();

        if (count($Emailtemplate) > 0) {
            return view("backEnd.emailtemplates.edit", compact("Emailtemplate"));
        } else {
            return redirect()->action('EmailTemplatesController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $Emailtemplate = \DB::table('emailtemplates')->where('id', $id)->get();
       
        if (count($Emailtemplate) > 0) {

            \DB::table('emailtemplates')
            ->where('id', $id)
            ->update(['name' => $request->name,'contents'=>$request->contents,'updated_at'=>Carbon::now()->toDateTimeString()]);

            return redirect()->action('EmailTemplatesController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('EmailTemplatesController@index');
        }
    }


    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,7) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Emailtemplates Module');
        }


            \DB::table('emailtemplates')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('EmailTemplatesController@index', $id)->with('doneMessage', "Email template deleted Successfully");

    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,7) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Emailtemplates Module');
        }

        //$Permissions = Permissions::orderby('id', 'asc')->get();

        return view("backEnd.emailtemplates.create");
    }

    public function store(Request $request)
    {

        //
        $this->validate($request, [
            'name' => 'required',
            'contents' => 'required',
        ]);

        \DB::table('emailtemplates')->insert(
            ['name' => $request->name,'contents'=>$request->contents,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('EmailTemplatesController@index')->with('doneMessage', trans('backLang.addDone'));
    }


}