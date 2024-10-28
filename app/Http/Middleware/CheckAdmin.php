<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $adminEmail = 'admin@gmail.com';

        if (!auth()->check()) {
            // Redirect to login or return login
            return redirect()->route('login'); // Change 'login' to your login route name
        }

        elseif (auth()->check()&& auth()->user()->role !== 'admin')
         {

           return redirect()->back()->with('alert', 'You must be admin to do it .');


        }else

        return $next($request);

    }

}
