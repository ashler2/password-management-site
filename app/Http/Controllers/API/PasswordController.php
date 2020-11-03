<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Password;
use App\Http\Resources\Password as PasswordResource;
use App\Http\Resources\Passwords;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return PasswordResource::collection($user->passwords);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = Password::create([
            'name'  =>  $request->name,
            'password'  =>  Crypt::encryptString($request->password),
            'email' => $request->email,
            'login' =>  $request->login,
            "password_length"   => Crypt::encryptString(strlen($request->password))
        ]);
        return $a ? response()->json('success',201) : response('error',500);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        return new PasswordResource($password);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password = Password::where('id', $id)->update([
            'name'  =>  $request->name,
            'password'  =>  Crypt::encryptString($request->password),
            'email' => $request->email,
            'login' =>  $request->login,
            "password_length"   => Crypt::encryptString(strlen($request->password)),
            ''
        ]);
        $password->update($request);
        return [$password, $id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
