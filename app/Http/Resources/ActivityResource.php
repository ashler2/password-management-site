<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Password;

class ActivityResource extends JsonResource
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
            'user'  => User::where('id',$this->user_id)->first(),
            'password'  => Password::where('id', $this->password_id)->first(),
            'viewed_at' =>  $this->viewed_at
        ];
    }
}
