<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $timestamps =  false;
    protected $fillable = [
        'user_id',
        'password_id',
        'viewed_at',
    ];
}
