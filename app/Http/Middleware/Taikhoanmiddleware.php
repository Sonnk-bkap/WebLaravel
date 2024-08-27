<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Taikhoanmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Kiểm tra nếu chưa đăng nhập
        if(!Auth::guard('tk')->check())
        {
            //Chuyển hướng về form đăng nhập
            return redirect()->route('tk.dangnhap');
        }
        return $next($request);
    }
}
