<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
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
        dd(5);
        if(session('utype') === 'USR'){
            return $next($request);
        }
        else{
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
