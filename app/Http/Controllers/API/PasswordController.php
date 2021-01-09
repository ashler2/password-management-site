<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\User;
use App\Http\Resources\Password as PasswordResource;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Gate;

use Throwable;


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
        if(Gate::allows('isAdmin')){

            return PasswordResource::collection(Password::all());
        }
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

        $formattedURL = $this->formatWebsite($request->website);
        $password = Password::create([
            'name'  =>  $request->name,
            'password'  =>  Crypt::encryptString($request->password),
            'email' => $request->email,
            'login' =>  $request->login,
            'website'   =>  $formattedURL,
            "password_length"   => Crypt::encryptString(strlen($request->password)), "image_url"    =>  $this->getPasswordFavicon($formattedURL)
        ]);
        return $password ? response()->json('success',201) : response('error',500);


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
    public function destroy(Password $password)
    {
        $deleted = $password->delete();
        return $deleted ? response()->json('success', 204) : response()->json('failed', 400);
    }

    public function decrypt(Password $password){
        
        return Crypt::decryptString($password->password);

    } 

    public function allPasswords(){
        return PasswordResource::collection(Password::all());
    }

    public function addPasswordToUser(Request $request){
        $user       =   User::where('id', $request->user)->first();
        $password   =   Password::where('id', $request->password)->first();

            if(!$user->passwords->contains($password)){
                $user->passwords()->attach($password);
                return response()->json([
                    'status'    =>  'Password Successfully added',
                    'password'  =>  $password
                ], 201);
            }
           

            return response()->json([
                'status'    => 'Password Failed to add',
                'Error'     => 'Password Already Exists.'
            ], 204);


    }

    public function removePasswordFromUser(Request $request){ 
        $user       =   User::where('id', $request->user)->first();
        $password   =   Password::where('id', $request->password)->first();
        $user->passwords()->detach($password);
        return response()->json([
            'status'    =>  'Password Successfully removed',
            'password'  =>  $password
        ], 201);
        return [$user, $password];
    }

    public function getPasswordFavicon ($url) {
        $apiUrl = 'http://favicongrabber.com/api/grab/';
        $response  = Http::get($apiUrl.$url);

        return $response->json()['icons'][0]['src'];

    }

    public function formatWebsite($websiteURl){
        $regex  = '/(?<=\/\/)(.*)/i';
        preg_match($regex, $websiteURl,$matches, );
        return $matches[0];
    }
}
