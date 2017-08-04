<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;


class FoundersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,10) === 0) {  
                return \Redirect::to(route('NoPermission'))->send();
            }
        }

    }


    public function index()
    {
        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,10);
        $Founders = \DB::table('founders')->where('delete_status', 0)->get();
        return view("backEnd.founders", compact("Founders","CheckLayoutPermission"));

    }

    public function edit($id)
    {

        $Founders = \DB::table('founders')->where('id', $id)->get();

        if ($this->edit_permission(@Auth::user()->role_type_id,10) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Founders Module');
        }

        if (count($Founders) > 0) {
            return view("backEnd.founders.edit", compact("Founders"));
        } else {
            return redirect()->action('FoundersController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $resources_id = \DB::table('founders')->where('id', $id)->update(
         ['name' => $request->title,'company_link'=>$request->company_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Founders Updated Successfully'); 
        return redirect()->action('FoundersController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,10) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Founders Module');
        }

        return view("backEnd.founders.create");
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'company_link' => 'required',

        ]);

        \DB::table('founders')->insert(
            ['name' => $request->title,'company_link'=>$request->company_link,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FoundersController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,10) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Founders Module');
        }

        $Company = \DB::table('founders')->where('id', $id)->get();
       
        if (count($Company) > 0) {

            \DB::table('founders')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('FoundersController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('FoundersController@index');
        }
    }

}
