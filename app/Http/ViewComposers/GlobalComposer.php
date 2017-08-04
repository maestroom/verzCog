<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $CheckViewMenuPermission = \DB::table('role_type_access')
        ->join('modules', 'role_type_access.module_id', '=', 'modules.id')
        ->where(['role_type_access.role_type_id'=> @Auth::user()->role_type_id,'role_type_access.view'=>1])
        ->select('role_type_access.module_id','modules.name','modules.label')->get();

        $view->with('CheckViewMenuPermission', $CheckViewMenuPermission);
    }

}