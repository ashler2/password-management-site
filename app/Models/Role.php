<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Permission;


class Role extends Model
{
    use HasFactory;
    public $timestamps =  false;
    
    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions');
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
}
