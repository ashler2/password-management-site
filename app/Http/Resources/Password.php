<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Password extends JsonResource
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
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'email'         =>  $this->email,
            'login'         =>  $this->login,
            'website'       =>  $this->website,
            'notes'         =>  $this->notes,
            // 'password'      =>  $this->password,
        ];
    }
}
