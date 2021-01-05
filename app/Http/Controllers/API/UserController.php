<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index () {

        return  UserResource::collection(User::all());
    }

    public function show(Request $request, User $user){

        return new UserResource($user);
    }
    
    public function store (Request $request){ 

        $user = User::create([
            'name'  =>  $request->user['name'],
            'email' =>  $request->user['email'],
            'password'  =>  Hash::make($request->user['password']),
        ]);

        return $user ?  response()->json([
            'user' => $user
            ]) : response()->json([
                'error' =>  'error'
            ]);
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        return $user->delete();
    }

    public function ban (User $user){
        $user->banned = true;
        $user->save();
        return response()->json([
            'user'  =>  $user->id,
            'banned'    => $user->banned,
            'success'    =>  true
        ], 201 );
    }

    public function unban(User $user){
        $user->banned = false;
        $user->save();
        return response()->json([
            'user'  =>  $user->id,
            'banned'    => $user->banned,
            'success'    =>  true
        ], 201 );
    } 

    public function loggedInUser(){
        return new UserResource(Auth::user());
    }
}
