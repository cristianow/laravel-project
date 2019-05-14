<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Permission;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles(){
        return $this->belongsToMany(\App\Models\Role::class);
    }

public function hasPermission(Permission $permission){
        return $this->hasAnyRoles($permission->roles);
}

public function hasAnyRoles($roles){
    if(is_array($roles) || is_object($roles)){
        return !! $roles->intersect($this->roles)->count();
        }else{
            
            return $this->roles->contains('name',$roles);
        }
}

public function getJWTIdentifier()
{
return $this->getKey();
}

/**
* Return a key value array, containing any custom claims to be added to the JWT.
*
* @return array
*/
public function getJWTCustomClaims()
{
return [];
}
}
