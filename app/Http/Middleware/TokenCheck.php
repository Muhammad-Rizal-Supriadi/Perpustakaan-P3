<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('token')) {
            return $next($request);
        }
        
        return redirect()->route('login.index');
    }
}
