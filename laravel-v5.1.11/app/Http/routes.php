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
Route::get('/article/{id}', function ($id) {
    echo '这是文章的详情, id为' . $id ;
});

//限制参数的类型
Route::get('/goods/{id}', function ($id) {
    echo '详情页,  id 为' .$id;
})->where('id', '[0-9]+');//加正则表达式限制

// 路由组
Route::group([],function () {

    // 多个参数
    Route::get('/{name}/{id}', function ($name, $id) {
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






