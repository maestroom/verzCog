<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Permissions;
use App\User;
use App\Modules;
use App\WebmasterSection;
use Auth;
use File;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;

class UsersController extends Controller
{

    private $uploadPath = "uploads/users/";



    public function __construct()
    {
        $this->middleware('auth');
         if(@Auth::user()->delete_status == 1){
            Auth::logout();
            return \Redirect::to(route('NoPermission'))->send();
        }else{
            if ($this->view_permission(@Auth::user()->role_type_id,16) === 0) {  

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


        $CheckLayoutPermission = $this->view_all_permission(@Auth::user()->role_type_id,16);
       // $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
/*        if ($this->view_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to View Users Module');
        }*/

        $Users = \DB::table('users')
        ->join('role_type', 'users.role_type_id', '=', 'role_type.id')
        ->join('companies', 'users.company', '=', 'companies.id')
        ->where('users.delete_status', 0)
        ->select('users.*', 'role_type.name as name1','companies.name as company_name')
        ->get();

        $UserRoleTypeId = @Auth::user()->role_type_id;

        $RoleNames = \DB::table('role_type_access')
        ->join('role_type', 'role_type_access.role_type_id', '=', 'role_type.id')
        ->select('role_type.name','role_type.id')
        ->distinct()
        ->get(['role_type_id']);

        $RoleModules = \DB::table('role_type_access')
        ->join('modules', 'role_type_access.module_id', '=', 'modules.id')->orderby('role_type_access.id')
        ->select('role_type_access.id as id1','modules.name as module_names','role_type_access.role_type_id as role_type_id','role_type_access.view','role_type_access.create','role_type_access.edit','role_type_access.delete')
        ->get();


        $role_array = Array();
/*

        print_R($RoleNames);
        echo "<br>";echo "<br>";
        print_R($RoleModules);
        exit;*/
        foreach($RoleNames as $key1=>$value1)
        {

            foreach($RoleModules as $value)
            {
                //$role_array[$value1->id][]= $value->module_names;
                if($value1->id === $value->role_type_id)
                {
                    $role_array[$value1->name]['modules'][]= $value->module_names;
                    $role_array[$value1->name]['id'][]= $value1->id;
                   // echo $value->create;
                    if($value->view ===1 )
                    {
                        $role_array[$value1->name]['Access'][]= "View";
                    }
                    if($value->create ===1 )
                    {
                        $role_array[$value1->name]['Access'][]= "Create";
                    }
                    if($value->edit ===1 )
                    {
                        $role_array[$value1->name]['Access'][]= "Edit";
                    }
                    if($value->delete ===1 )
                    {
                        $role_array[$value1->name]['Access'][]= "Delete";
                    }
                    else{
                        $role_array[$value1->name]['Access'][]= "";
                    }
                }

            }

            $role_array[$value1->name]['modules'] = array_unique($role_array[$value1->name]['modules']);
            $role_array[$value1->name]['Access'] = array_unique($role_array[$value1->name]['Access']);
            $role_array[$value1->name]['id'] = array_unique($role_array[$value1->name]['id']);

            //print_R($role_array[$value1->name]['Access']);
        }



//exit;

        return view("backEnd.user1", compact("Users","role_array","CheckLayoutPermission"));

    }

    public function visitorsSubscribed()
    {
        $Subscription = \DB::table('subscription')->get();

        return view("backEnd.visitorssubscribed", compact("Subscription"));

    }



    public function create()
    {
        if ($this->create_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Users Module');
        }

        $Companies = \DB::table('companies')->where('status', 1)->get();
        $RoleNames = \DB::table('role_type')
        ->select('id','name')
        ->get();

        return view("backEnd.users.create", compact("Companies", "RoleNames"));
    }


    public function store(Request $request)
    {
        //


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'rolename' => 'required',
            'status' => 'required',
        ]);

        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->company = $request->company;
        $User->password = bcrypt($request->password);
        $User->role_type_id = $request->rolename;
        $User->status = $request->status;
        $User->created_by = Auth::user()->id;
        $User->save();

        return redirect()->action('UsersController@index')->with('doneMessage', trans('backLang.addDone'));
    }



    public function storeCsr(Request $request)
    {
        //
        foreach($request->csr as $key=>$value)
        {
            $UpdateCsr = \DB::table('users')->where('id', $key)->update(['csr' => $request->csr[$key][0],'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);
        }

        return redirect()->action('UsersController@index')->with('doneMessage', trans('backLang.addDone'));

    }


    public function edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Users Module');
        }
        $UserCsrId = 0;

        $Users = \DB::table('users')
        ->join('role_type', 'users.role_type_id', '=', 'role_type.id')
        ->join('companies', 'users.company', '=', 'companies.id')
        ->where('users.delete_status', 0)
        ->where('users.id', $id)
        ->select('users.*', 'role_type.name as name1','companies.name as company_name')
        ->get();

        $Users_Id = \DB::table('users')
        ->where('id', $id)
        ->select('company')
        ->get();

        $Users_Csr = \DB::table('users')
        ->join('companies', 'users.company', '=', 'companies.id')
        ->where('users.delete_status', 0)
        ->where('users.company', $Users_Id[0]->company)
        ->select('users.*','companies.name as company_name')
        ->get();

        $UserIsCsr = \DB::table('users')
        ->where('delete_status', 0)
        ->where('company', $Users_Id[0]->company)
        ->where('quiz_rep', 1)
        ->select('id')
        ->get();

        if(count($UserIsCsr)>0)
        {
            $UserCsrId = $UserIsCsr[0]->id;
        }

        $RoleNames = \DB::table('role_type')
        ->select('id','name')
        ->get();

        return view("backEnd.users.edit", compact("Users", "RoleNames","Users_Csr","UserCsrId"));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'=>   'required|email|unique:users,email,'.$id,
            'rolename' => 'required',
            'status'=>'required',
            'quiz_rep'=>'required'

        ]);
        $RemoveCsr = \DB::table('users')->where('company', $request->company_id)->update(['quiz_rep' => 0,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);

        $UpdateCsr = \DB::table('users')->where('id', $request->quiz_rep)->update(['quiz_rep' => 1,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);

        $UpdateCsr = \DB::table('users')->where('id', $id)->update(['name' => $request->name,'email' => $request->email,'password' => bcrypt($request->password),'status' => $request->status,'role_type_id' => $request->rolename,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);

        if(isset($request->password))
        {
            $Update_user = \DB::table('users')->where('id', $id)->update(['name' => $request->name,'email' => $request->email,'password' => bcrypt($request->password),'status' => $request->status,'role_type_id' => $request->rolename,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);
        }else{

            $Update_user = \DB::table('users')->where('id', $id)->update(['name' => $request->name,'email' => $request->email,'role_type_id' => $request->rolename,'status' => $request->status,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);
        }

        return redirect()->action('UsersController@index')->with('doneMessage', trans('backLang.addDone'));

    }


/*    public function destroy($id)
    {
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $User = User::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $User = User::find($id);
        }
        if (count($User) > 0 && $id != 1) {
            // Delete a User photo
            if ($User->photo != "") {
                File::delete($this->getUploadPath() . $User->photo);
            }

            $User->delete();
            return redirect()->action('UsersController@index')->with('doneMessage', trans('backLang.deleteDone'));
        } else {
            return redirect()->action('UsersController@index');
        }
    }*/

    public function destroy($id)
    {
        if ($this->delete_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Users Module');
        }

        $User = \DB::table('users')->where('id', $id)->get();
       
        if (count($User) > 0) {

            \DB::table('users')
            ->where('id', $id)
            ->update(['delete_status' => 1]);

            return redirect()->action('UsersController@index', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('UsersController@index');
        }
    }



    public function deleteAll(Request $request)
    {

        \DB::table('users')->wherein('id', $request->Ids)->update(['delete_status' => 1]);

        return redirect()->action('UsersController@index')->with('doneMessage', trans('backLang.saveDone'));
    }



    public function permissions_create()
    {


        if ($this->create_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Create Users Module');
        }

        $Modules = Modules::get(array("id","name"));
        return view("backEnd.users.permissions.create", compact("Modules"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function permissions_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'module' => 'required',
        ]);

        $Insert_role_type = \DB::table('role_type')->insertGetId(['name' => $request->name,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);


        foreach($request->module as $key=>$value)
        { 

            $Insert_role_type_access = \DB::table('role_type_access')->insertGetId(['module_id' => $key,'view' => $request->module[$key]["'view'"][0],'create' => $request->module[$key]["'create'"][0],'edit' => $request->module[$key]["'edit'"][0],'delete' => $request->module[$key]["'delete'"][0],'role_type_id' => $Insert_role_type,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);

        }
        return redirect()->action('UsersController@index')->with('doneMessage', 'New Role type added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function permissions_edit($id)
    {

        if ($this->edit_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Edit Users Module');
        }

        $Modules = Modules::get(array("id","name"));

        $UserRoleTypeId = @Auth::user()->role_type_id;



        $role_array = \DB::table('role_type_access')
        ->join('role_type', 'role_type.id', '=', 'role_type_access.role_type_id')
        ->join('modules', 'role_type_access.module_id', '=', 'modules.id')
        ->orderby('role_type_access.id')
        ->select('role_type.name as role_name','role_type_access.id as id1','modules.name as module_names','role_type_access.module_id as module_id','role_type_access.view','role_type_access.create','role_type_access.edit','role_type_access.delete')
        ->where('role_type_access.role_type_id',$id)
        ->get();

        //$Modules = Modules::get(array("id","name"));
        return view("backEnd.users.permissions.edit", compact("role_array","Modules","id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function permissions_update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'module' => 'required',
        ]);


        $Update_role_type = \DB::table('role_type')->where('id', $id)->update(['name' => $request->name,'updated_by'=>Auth::user()->id,'updated_at'=>Carbon::now()->toDateTimeString()]);

        $delete_role_type_access = \DB::table('role_type_access')->where('role_type_id',$id)->delete();

        foreach($request->module as $key=>$value)
        { 

            $Insert_role_type_access = \DB::table('role_type_access')->insertGetId(['module_id' => $key,'view' => $request->module[$key]["'view'"][0],'create' => $request->module[$key]["'create'"][0],'edit' => $request->module[$key]["'edit'"][0],'delete' => $request->module[$key]["'delete'"][0],'role_type_id' => $id,'created_by'=>Auth::user()->id,'created_at'=>Carbon::now()->toDateTimeString()]);

        }

        return redirect()->action('UsersController@index')->with('doneMessage', 'Role type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function permissions_destroy($id)
    {
        if ($this->delete_permission(@Auth::user()->role_type_id,16) === 0) {  
            return redirect()->back()->with('doneMessage', 'You dont have Permission to Delete Users Module');
        }
        $delete_role_type_access = \DB::table('role_type_access')->where('role_type_id',$id)->delete();
        $delete_role_type = \DB::table('role_type')->where('id',$id)->delete();

        return redirect()->action('UsersController@index')->with('doneMessage', 'Role type Deleted successfully');
    }


}
