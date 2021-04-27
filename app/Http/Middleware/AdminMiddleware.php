<?php

namespace App\Http\Middleware;

use Closure;
use DB,Session,Response,Redirect;

class AdminMiddleware
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
        if(Session::get('id') != ""){

            if(Session::get('role_id') == 1){

                return $next($request);

            }else if(Session::get('role_id') == 2){

                return redirect()->route('user-profile');
                
            }else{

                return redirect()->route('AdminLogin');
                
            }
        }else{

            return redirect()->route('AdminLogin');
            
        }
    }
}