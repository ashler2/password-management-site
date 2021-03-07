<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Password;
use App\Models\Category;
use App\Helpers\PasswordHelper;
use App\Http\Resources\Password\PasswordResource;
use App\Http\Requests\StorePasswordRequest;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('isAdmin')){
            $passwords = Password::all();
        } else {
            $passwords = Auth::user()->passwords;
        }
        return Inertia::render('Dashboard', [
            'passwords' =>  PasswordResource::collection($passwords)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Password/PasswordCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasswordRequest $request)
    {
        if($request->website){
            $formattedURL = PasswordHelper::formatWebsite($request->website);
        } else {
            $formattedUrl = null;
        }

        $password = Password::create([
            'name'  =>  $request->name,
            'password'  =>  Crypt::encryptString($request->password),
            "password_length"   => Crypt::encryptString(strlen($request->password)), "website_image_url"    =>  PasswordHelper::getPasswordFavicon($formattedURL),
            'email' => $request->email,
            'login' =>  $request->login,
            'website'   =>  $formattedURL,
            'notes'     =>  $request->notes,
            "category_id" =>   $request->category_id
        ]);
        return Redirect::route('password.show', $password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
          return Inertia::render('Password/PasswordSingle', [
            'password'  =>  new PasswordResource($password)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $id)
    {
        //
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
        //
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
