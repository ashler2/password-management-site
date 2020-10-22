<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Password extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'login',
        'password',
    ];
    protected $hidden = ["password"];

    public function Category () {
        return $this->hasOne(Category::class);
    }
}
