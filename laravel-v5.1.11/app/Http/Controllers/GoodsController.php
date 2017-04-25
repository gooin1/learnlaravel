<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function getAdd(){
        return view('add');
    }

    public function getShow(){
        echo "getShow";
    }

    public function postInsert(){
        echo '商品插入操作';
    }
}
