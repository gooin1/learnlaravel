<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    // 模型操作的表
    public $table = 'goods';
    // 当前表的主键字段
    public $primaryKey = 'id';
    // 时间字段
    public $timestamps = false;
}
