<?php

namespace App\Http\Middleware;



use Closure;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;

class AuthUser
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
        if(Session::get('user_id') != ""){
            return $next($request);
        }else{
            // return redirect('Login');
            return redirect()->route('Login');
        }
    }
}
