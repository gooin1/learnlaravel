<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function show(){
        echo 'show function';
    }
    // 用户编辑
    public function edit($id) {
        echo 'edit 函数, 用户的 id 为'.$id ;
    }
    // 用户删除操作
    public function delete($id) {
//        echo "delete";
        // 通过别名创建url
        echo route('udelete',['id' => 100]);
    }

    public function update(){
        echo 'update';
    }

    public function request(Request $request){
        //echo "request";
        // 获取请求的方法
//        $method = $request->method();
//        echo $method;
//        echo "<br>";
//        // 获取请求的完整 url
//        $url = $request->url();
//        echo $url;
//        echo "<br>";
//        // 检测请求方式
//        $res = $request->isMethod('get');
//        var_dump($res);
//        echo "<br>";
//        // 检测请求的路径
//        $path = $request->path();
//        var_dump($path);
//        echo "<br>";
//        // 检测请求的ip
//        $ip = $request->ip();
//        echo $ip;
//        // 检测请求的端口
//        $port = $request->getPort();
//        var_dump($port);

        // 参数获取
        $username = $request->input('username');
        echo $username;
    }
}
