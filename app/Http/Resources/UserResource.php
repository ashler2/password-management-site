<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Role;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' =>  $this->roles,
            // 'permissions'   =>  $this->roles->permissions,
            'passwords' =>  $this->passwords,
            'banned'    =>  $this->banned
        ];
    }
}
