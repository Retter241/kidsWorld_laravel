<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Redirect;

class Isadmin 
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
        if(Auth::check()){
            if (Auth::user()->id != 1 ) {
                //dd(Auth::user()->id);
                //return redirect('login');
                //return redirect()->back();
               return redirect('profile');

               /* Auth::logout();
                return redirect('login')->with('error', 'У вас нет доступа');*/
            }
        }
        

        return $next($request);
    }
}
