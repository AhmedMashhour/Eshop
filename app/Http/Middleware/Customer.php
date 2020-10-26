<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next=null, $guard = null)
    {
        if (auth()->guard($guard)->check()) {
            return $next($request);

        }else
        {
            return redirect('customer/login');

        }

    }
}
