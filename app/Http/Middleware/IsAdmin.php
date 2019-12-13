<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;

class IsAdmin
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
        if(Session::get('login')==1){
            $userss = Session::get("role");
            //dd($userss);
            if($userss == "user"){
                return redirect('homepage');
            }
            else {
                return $next($request);
            }
        }
        else{
            return redirect('login');
        }
    }
}
