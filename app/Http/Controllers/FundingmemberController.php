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

class FundingmemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


/*        if (@Auth::user()->role_type_id !== 1 && @Auth::user()->role_type_id !== 2) {  
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }*/
    }


    public function index()
    {

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {

            $Fundingmember = \DB::table('funding_member')->where('delete_status', 0)->get();
            $Permissions = Permissions::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {

            $Fundingmember = \DB::table('funding_member')->where('delete_status', 0)->get();
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }

        return view("backEnd.fundingmember", compact("Fundingmember", "Permissions","GeneralWebmasterSections"));

    }

    public function edit($id)
    {

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        $Permissions = Permissions::orderby('id', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            //$Fundingmember = User::where('created_by', '=', Auth::user()->id)->find($id);
            $Fundingmember = \DB::table('funding_member')->where('id', $id)->get();

        } else {
            $Fundingmember = \DB::table('funding_member')->where('id', $id)->get();
        }


        if (count($Fundingmember) > 0) {
            return view("backEnd.fundingmember.edit", compact("Fundingmember", "Permissions", "GeneralWebmasterSections"));
        } else {
            return redirect()->action('FundingmemberController@index');
        }
    }


    public function update(Request $request, $id)
    {

        $resources_id = \DB::table('funding_member')->where('id', $id)->update(
         ['name' => $request->title,'company_link'=>$request->company_link,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]
        );

        \Session::flash('success', 'Fundingmember Updated Successfully'); 
        return redirect()->action('FundingmemberController@index')->with('doneMessage', trans('backLang.addDone'));
    }


    public function create()
    {

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        //$Permissions = Permissions::orderby('id', 'asc')->get();

        return view("backEnd.fundingmember.create", compact("GeneralWebmasterSections", "Permissions"));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'company_link' => 'required',

        ]);

        \DB::table('funding_member')->insert(
            ['name' => $request->title,'company_link'=>$request->company_link,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]
        );

        return redirect()->action('FundingmemberController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    public function destroy($id)
    {

        $Company = \DB::table('funding_member')->where('id', $id)->get();
       
        if (count($Company) > 0) {

            \DB::table('funding_member')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('FundingmemberController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('FundingmemberController@index');
        }
    }



}