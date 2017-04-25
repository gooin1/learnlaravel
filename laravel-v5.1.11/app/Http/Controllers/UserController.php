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
}
