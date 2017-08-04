<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{


    public function permissionsGroup()
    {

        return $this->belongsTo('App\Permissions', 'permissions_id');
    }

    use Notifiable;
   // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'company',
        'role_type_id',
        'password',
        'status',
        'permissions',
        'connect_email',
        'connect_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
