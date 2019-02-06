<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(Session::has('session_admin'))){
            return redirect('/admin')->with('error','You are not allowed without login !! Please login to access the page');
        }
        return $next($request);
    }
}
