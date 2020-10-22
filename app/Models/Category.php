<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Password;
class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'screen_name'
    ];

    public function Password () {
        return $this->belongsToMany(Password::class);
    }
}
