<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


use App\Models\Password;
use App\Http\Resources\Password\PasswordResource;


class PasswordController extends Controller
{
    public function decrypt(Password $password){





        if(Auth::user()->passwords->contains($password)){
            return response()->json(['password' => Crypt::decryptString($password->password)], 200);
        }
        return response()->json([
            'error' =>  'You do have have the ability to view this, please contact your system admin'
        ], 403);
    }
}
