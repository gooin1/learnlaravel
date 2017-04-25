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

Route::get('/home', function (){
    echo 'fffff';
});

Route::get('/admin', function () {
    echo 'admin page';
});

Route::get('/admin/user', function () {
    echo 'admin page/user';
});

