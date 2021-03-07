<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Activity;



class TrackPasswordDecrypt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        Activity::create([
            'user_id'   =>  Auth::user()->id,
            'password_id'   =>  $request->route('password')->id,
            'viewed_at'     =>  Carbon::now()    
        ]);

        return $next($request);
    }
}
