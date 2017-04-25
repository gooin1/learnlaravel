<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleWare
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
        // [2017-4-8 10:4:5]127.0.0.1 --/admin/user/index
        // 记录当前请求的路径
        $str = '['.date('Y-m-d H:i:s').'] '. $request->ip() .' ----- ' .$request->path();
        // 将字符串路径存入日志中
        file_put_contents('request.log', $str."\r\n", FILE_APPEND);
        // 进入下一层代码执行
        return $next($request);
    }
}
