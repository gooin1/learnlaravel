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
//        $username = $request->input('username');
//        echo $username;
        // 设置默认值
//        $name = $request->input('name','gooin');
//        echo $name;
//        确认是否有输入值
//        $res = $request->has('username');
//        var_dump($res);
//        获取所有参数
//        $res = $request->all();
//        var_dump($res);
//        获取部分参数
//        $only = $request->only(['name', 'pwd']);
//        var_dump($only);
//            剔除不需要的参数
//        $except = $request->except(['name']);
//        var_dump($except);

//            获取请求头信息
            $res = $request->header('Cookie');
            var_dump($res);

    }

    public function form(){
        return view('user-form');
    }

    public function insert(Request $request){
        // 获取表单中的用户名, 密码
        $username = $request->input('username');
        $password = $request->input('password');
        echo $username .' , '. $password;

    }

    // 显示 form 表单
    public function file(){
        return view('file');
    }

    public function upload(Request $request)
    {
        // 检测文件是否有上传
//        $res = $request->file('profile');
        if ($request->hasFile('profile')) {
            $request->file('profile')->move('./upload', 'helli.jpg');

        }
//        var_dump($res);
    }

    public function cookie(Request $request)
    {
        // 写入 cookie
//        cookie('name', 'gooin', 20);//时间单位为分钟
//        return response('')->withCookie(cookie('name', 'diuleiloumou', 20));

        // 读取Cookie
        $res = $request->cookie('name');
        var_dump($res);
    }

    public function flash()
    {
        return view('flash');
    }

    public function doFlash(Request $request)
    {
//        $all = $request->all();
//        var_dump($all);
        // 将请求的参数都闪存起来
        $request->flash();
        // 跳转到原来的页面重写参数
        return back();
    }

    public function old()
    {
        var_dump(old('name'));
    }
}
