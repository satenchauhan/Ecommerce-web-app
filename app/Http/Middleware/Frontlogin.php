<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class Frontlogin
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
        //echo Session::get('user_session'); die;
        if(empty(Session::has('user_session'))){
            return redirect('/login-register');
        }
        return $next($request);
    }
}
