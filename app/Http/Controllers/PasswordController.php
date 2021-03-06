<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\Password;
use App\Models\Category;

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
            'passwords' =>  $passwords
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Password/PasswordCreate', [
            'categories'    =>  Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  =>  'required',
            'password'  =>  'required',
            'category_id' => 'required'
        ]);
        $formattedURL = $this->formatWebsite($request->website);
        $password = Password::create([
            'name'  =>  $request->name,
            'password'  =>  Crypt::encryptString($request->password),
            'email' => $request->email,
            'login' =>  $request->login,
            'website'   =>  $formattedURL,
            "password_length"   => Crypt::encryptString(strlen($request->password)), "image_url"    =>  $this->getPasswordFavicon($formattedURL),
            'notes'     =>  $request->notes,
            "category_id" =>   $request->category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Password $id)
    {
        //
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
