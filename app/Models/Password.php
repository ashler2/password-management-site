<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Password extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
        'website',
        'notes',
        'category_id',
        'password_length'
    ];
    protected $hidden = ["password"];

    public function Category () {
        return $this->hasOne(Category::class);
    }

    public function Users() {
        return $this->belongsToMany(User::class);
    }
}
