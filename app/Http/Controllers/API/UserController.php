<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index () {

        return  UserResource::collection(User::all());
    }

    public function show(Request $request){
        // return new UserResource();
    }
}
