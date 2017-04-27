<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 指定路由
Route::get('/', function () {
    return view('welcome');
});

// get 形式路由
Route::get('/admin/user', function () {
    echo 'admin page/user';
});

// 显示出 html 表单页路由
Route::get('/form', function() {
    return view('form');
});

// post 形式路由
Route::post('/insert', function () {
    echo "insert";
});


// put 请求
Route::get('/put', function() {
   return view('put');
});
Route::put('/update', function () {
    echo "put";
});

// 带参数的路由规则
Route::get('/text/{id}', function ($id) {
    echo '这是文章的详情, id为' . $id ;
});

//限制参数的类型
Route::get('/sth/{id}', function ($id) {
    echo '详情页,  id 为' .$id;
})->where('id', '[0-9]+');//加正则表达式限制

// 路由组
Route::group([],function () {

    // 多个参数
    Route::get('/user/{name}/{id}', function ($name, $id) {
        echo "名字为: " .$name .", id 为: " .$id;
    })->where(['name' => '[a-z]+'],['id' => '[0-9]+']);

// 别名
    Route::get('/admin/user/index', [
        'as' => 'users', function() {
            echo route('users'); // route 函数, 通过路由别名创建完整 url
//        echo "alias";
        }
    ]);
    // 404
    Route::get('/404', function () {
       abort(404);
    });
});


    Route::get('/setting', [
        'middleware' => 'login',
        function() {
            echo "settings page";
        }
    ]);
    // 登录
    Route::get('/login', function () {
        echo "login page";
    });

    // 写入 session uid
    Route::get('session', function (){
       session(['uid' => 10]);
    });

    // 网站后台
    Route::get('admin', function (){
        echo '后台页面';
    })->middleware('login');


    Route::get('/controller','UserController@show');

    // 用户的修改
    Route::get('/user/{id}/edit','UserController@edit');

    Route::get('/admin/user/delete/{id}', [
        'as' => 'udelete',
        'uses' => 'UserController@delete']
    );
    // 用户的升级
    Route::get('/admin/user/update', [
        'middleware' => 'login',
        'uses' => 'UserController@update'
    ]);

    // 隐式控制器
    Route::controller('goods', 'GoodsController');

    // RESTful 控制器
    Route::resource('article', 'ArticleController');

    // 请求
    Route::get('/request', 'UserController@request');


    //显示一个form表单
    Route::get('/user-form', 'UserController@form');

    Route::post('/user-form', 'UserController@insert');

    //文件
    Route::get('/file', 'UserController@file');
    Route::post('/upload', 'UserController@upload');

    // Cookie
Route::get('/cookie', 'UserController@cookie');
Route::get('/flash', 'UserController@flash');
Route::post('/flash', 'UserController@doFlash');
Route::get('/old', 'UserController@old');

// 响应路由
Route::get('/response', 'UserController@response');
// 视图路由
Route::get('/view', 'UserController@view');
// blade路由
Route::get('/blade', 'UserController@blade');
// blade 使用 @include('') 引入子视图
Route::get('/page', 'UserController@page');
Route::get('/cart', 'UserController@cart');
// blade 模板继承
Route::get('/layout', 'UserController@layout');
Route::get('/extend', 'UserController@extend');



