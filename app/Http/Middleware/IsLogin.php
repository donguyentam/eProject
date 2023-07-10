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
            else if($user->id == 5){
                 return redirect('/')->with('notify','Bạn không có quyền đăng nhập vào trang này');
            }else
            return redirect('login')->with('notify','Đăng nhập không thành công');
        }
               
        
        
        else
        {
            return redirect()->route('login');
        }
    }
}
