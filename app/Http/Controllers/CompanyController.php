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

class CompanyController extends Controller
{

    private $uploadPath = "uploads/banners/";



    public function __construct()
    {
        $this->middleware('auth');
        if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,6) === 0) {  

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

        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,6);
       // $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        if ($this->view_permission(@Auth::user()->role_type_id,6) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to View Companies Module');
        }

        $Company = \DB::table('companies')->where('status', 1)->get();
        return view("backEnd.company", compact("Company","CheckLayoutPermission"));

    }

    public function edit($id)
    {
        if ($this->edit_permission(@Auth::user()->role_type_id,6) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Companies Module');
        }

        $Company = \DB::table('companies')->where('id', $id)->get();

        if (count($Company) > 0) {
            return view("backEnd.companies.edit", compact("Company"));
        } else {
            return redirect()->action('CompanyController@index');
        }
    }


    public function update(Request $request, $id)
    {


        $Company = \DB::table('companies')->where('id', $id)->get();
       
        if (count($Company) > 0) {

            \DB::table('companies')
            ->where('id', $id)
            ->update(['name' => $request->name,'domain'=>$request->domain,'updated_at'=>Carbon::now()->toDateTimeString()]);

            return redirect()->action('CompanyController@edit', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('CompanyController@index');
        }
    }


    public function destroy($id)
    {

        if ($this->delete_permission(@Auth::user()->role_type_id,6) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Companies Module');
        }

        $Company = \DB::table('companies')->where('id', $id)->get();
       
        if (count($Company) > 0) {

            \DB::table('companies')
            ->where('id', $id)
            ->update(['status' => 0]);

            return redirect()->action('CompanyController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('CompanyController@index');
        }
    }

    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,6) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Companies Module');
        }

        //$Permissions = Permissions::orderby('id', 'asc')->get();

        return view("backEnd.companies.create");
    }

    public function store(Request $request)
    {

        //
        $this->validate($request, [
            'name' => 'required',
            'domain' => 'required',
        ]);

        \DB::table('companies')->insert(
            ['name' => $request->name,'domain'=>$request->domain,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('CompanyController@index')->with('doneMessage', trans('backLang.addDone'));
    }



}