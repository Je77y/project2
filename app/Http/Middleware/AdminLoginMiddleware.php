<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        if (session('taikhoan'))
        {
            $user = session('taikhoan');
            if ($user->level == 1)
                return $next($request);
        }
        return redirect('admin/dangnhap');
    }
}
