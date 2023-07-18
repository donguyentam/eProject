<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = \Sentinel::check())
        {
            if ($user->id == 1)
                return $next($request);
            else {
                 return redirect('/')->with('notify','You do not have access to this page.');
            } 
            
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
