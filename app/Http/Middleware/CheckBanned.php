<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckBanned
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

        if(auth()->check() && auth()->user()->banned){

            return response()->json([
                'message'   =>      'Your account is banned, please contact, your   admin.',
                
            ], 403);
        }
        return $next($request);
    }
}
