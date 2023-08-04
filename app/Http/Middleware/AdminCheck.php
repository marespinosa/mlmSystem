<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
   
    public function handle(Request $request, Closure $next)
    {

         if (Auth::check()) {
            if (Auth::user()->userlevel === 'Admin') {
                return $next($request);
            }
        }

        return redirect('dashboard')->with('error', 'You are not authorized to access this page.');
    }
}
