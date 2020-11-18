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
}
