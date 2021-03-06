<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

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
        if(Auth::user()->user_type == 'admin')
        {
            return $next($request);
        }else{
//            die('Access Dinaid');
             return redirect('/home')
                 ->with('status','You are not oloud to Admin Dashboard');
        }

    }
}
