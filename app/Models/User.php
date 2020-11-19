<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use App\Models\Password;
use App\Models\Permission;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function passwords () {
        return $this->belongsToMany(Password::class, "password_user");
    }


    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function hasRoles(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('name', $role)){
                return true;
            };
        }
        return false;
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function hasPermission($permission){
        // return (bool) $this->permissions->where('name', $permission)->count();
        return $this->hasPermissionThroughRole($permission);
    }

    public function hasPermissionThroughRole($permission){
        foreach($permission->roles as $role)
        {
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    public function getPermission(array $permission){
        return Permission::whereIn('name', $permission)->get();
    }

    public function givePermission(...$permission){
        $permissions = $this->getPermission(Arr::flatten($permission));
        if($permissions === null){
            return $this;
        };
        $this->permissions()->saveMany($permission);
        return $this;
    }

    public function removePermission(...$permission){
        $permissions = $this->getPermission(Arr::flatten($permission));
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function isBanned(){
        return $this->banned ? true : false;
    }



}
