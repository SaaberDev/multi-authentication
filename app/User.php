<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
 * Role Relationship with User
 * */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    /*
     * Check if User has any Role
     * */
    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /*
     * Check if User has at least a one Role
     * */
    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    /*
     * Authorization Check
     * */
    public function authorizeRoles($roles){
        if(is_array($roles)){
            return $this->hasAnyRole($roles) || abort(401, 'Access Denied | Authorization Required');
        }
        return $this->hasRole($roles) || abort(401, 'Access Denied | Authorization Required');
    }

    /*
     * Pivot Table Relationship
     * */
    public function role_users(){
        return $this->hasMany(RoleUser::class);
    }
}
