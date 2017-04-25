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



