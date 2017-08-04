<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function __construct() {

       $variable2 = "I am Data 2";
       View::share ( 'variable2', $variable2 );
    } 

    protected function create_permission($role_type_id,$module_id)
    {
    	$CheckCreatePermission = \DB::table('role_type_access')->where(['role_type_id'=> $role_type_id,'module_id'=>$module_id])->select('create')->get();
    	if(!empty($CheckCreatePermission[0]))
    	{
    		if($CheckCreatePermission[0]->create===1)
	    	{
	    		return 1;
	    	}
	    	return 0;
    	}
    	return 0;
    }

    protected function edit_permission($role_type_id,$module_id)
    {
    	$CheckEditPermission = \DB::table('role_type_access')->where(['role_type_id'=> $role_type_id,'module_id'=>$module_id])->select('edit')->get();
    	if(!empty($CheckEditPermission[0]))
    	{
    		if($CheckEditPermission[0]->edit===1)
	    	{
	    		return 1;
	    	}
	    	return 0;
    	}
    	return 0;
    }

    protected function delete_permission($role_type_id,$module_id)
    {
    	$CheckDeletePermission = \DB::table('role_type_access')->where(['role_type_id'=> $role_type_id,'module_id'=>$module_id])->select('delete')->get();
    	if(!empty($CheckDeletePermission[0]))
    	{
    		if($CheckDeletePermission[0]->delete===1)
	    	{
	    		return 1;
	    	}
	    	return 0;
    	}
    	return 0;
    }

    protected function view_permission($role_type_id,$module_id)
    {
    	$CheckViewPermission = \DB::table('role_type_access')->where(['role_type_id'=> $role_type_id,'module_id'=>$module_id])->select('view')->get();
    	if(!empty($CheckViewPermission[0]))
    	{
    		if($CheckViewPermission[0]->view===1)
	    	{
	    		return 1;
	    	}
	    	return 0;
    	}
    	return 0;
    }

    protected function view_all_permission($role_type_id,$module_id)
    {
        $CheckLayoutPermission = \DB::table('role_type_access')
        ->join('modules', 'role_type_access.module_id', '=', 'modules.id')
        ->where(['role_type_access.role_type_id'=> $role_type_id,'role_type_access.view'=>1,'role_type_access.module_id'=>$module_id])
        ->select('role_type_access.module_id','role_type_access.view','role_type_access.create','role_type_access.edit','role_type_access.delete','modules.name','modules.label')->get();

        return $CheckLayoutPermission;

       // print_R($$CheckViewMenuPermission);
       // echo count($CheckViewMenuPermission);
/*        if(!empty($CheckViewPermission[0]))
        {
            if($CheckViewPermission[0]->view===1)
            {
                return 1;
            }
            return 0;
        }
        return 0;*/
    }

    public function getDownload($file_path,$file_name)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path().'/uploads/'.$file_path.'/'.$file_name;
        $headers = array(
                  'Content-Type: application/pdf',
                );

        return \Response::download($file, $file_name, $headers);
    }

    public function updateTracker($tracked_date,$action)
    {

        $Globaltracks = \DB::table('global_tracks')->where('tracked_date', $tracked_date)->get();
        if (count($Globaltracks) > 0) {

            \DB::table('global_tracks')
            ->where('tracked_date', $tracked_date)
            ->increment($action,1,['updated_at'=>Carbon::now()->toDateTimeString()]);

        } else {

            $Globaltracks_id = \DB::table('global_tracks')->insert(
            ['tracked_date' => $tracked_date,$action => 1,'created_at'=>Carbon::now()->toDateTimeString()]);

        }

    }


}
