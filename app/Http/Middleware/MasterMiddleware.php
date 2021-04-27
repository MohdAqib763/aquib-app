<?php

namespace App\Http\Middleware;

use Closure;
use DB,Session,Response,Redirect;

class MasterMiddleware
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

            if(Session::get('user_type') == 1){

                return redirect()->route('Admin.Dashboard');

            }else if(Session::get('user_type') == 2){

                return $next($request);

            }else if(Session::get('user_type') == 3){

                return redirect()->route('Distributor.Dashboard');

            }else if(Session::get('user_type') == 4){

                return redirect()->route('Retailer.Dashboard');

            }

        }else{

            /* return redirect('Login'); */
            return redirect()->route('Login');
            
        }
        /*return $next($request);*/
    }
}
