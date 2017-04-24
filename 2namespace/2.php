<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/24
 * Time: 14:58
 */

// 命名空间使用
namespace one\two;

// 引入类文件
include '2-1.php';
include '2-2.php';

$obj = new \one\Obj();

$obj2 = new \one\two\Obj();
var_dump($obj2);

