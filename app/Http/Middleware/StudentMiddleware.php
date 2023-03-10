<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->user_type == '0')
            {
                return $next($request);
            }
            else
            {
                return redirect('/login')->with('status','Access Denied! as you are not as admin');
            }
        }
        else
        {
            return redirect('/login')->with('status','Please Login First');
        }
    }
}
