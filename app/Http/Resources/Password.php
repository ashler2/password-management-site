<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Activity;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;



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
            'password_length'   =>  Crypt::decryptString($this->password_length),
            'category_id'   =>  $this->category_id,
            'website_img'   =>  $this->image_url,
            'last_used'     =>  Activity::where('password_id', $this->id)->orderBy('viewed_at', 'desc')->limit(1)->get()
            // SELECT * FROM activities WHERE `password_id` = 21 ORDER BY viewed_at DESC LIMIT 1;
        ];
    }
}
