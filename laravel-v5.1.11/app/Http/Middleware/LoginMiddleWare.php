<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleWare
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
        // 检测是否有 session 信息
        if(!session('uid')){
            // 跳转到某个 url
            return redirect('/login');
        }
        return $next($request);
    }
}
