<?php
include_once "./vendor/autoload.php";

// // 创建二维码
// use Arcanedev\QrCode\QrCode;
// $qrCode = new QrCode;
// $qrCode->setText("I would love to change the world, but they won't give me the source code");
// $qrCode->setSize(200);

// echo $qrCode->image("image alt", ['class' => 'qr-code-img']);


// // 使用 curl 发送
// $curl = new \xiaohigh\Curl;
// $res = $curl->get("http://gooin.xyz");
// echo $res; 


// // 使用验证码
// use Gregwar\Captcha\CaptchaBuilder;

// $builder = new CaptchaBuilder;
// $builder->build();

// header('Content-type: image/jpeg');
// $builder->output();

// 中文分词

//实例化对象
$obj = new \xiaohigh\Pscws4\Pscws4;

$str = '借助开源免费分词系统pscws4,实现一个简单的php分词类文件,方便进行中文分词';
//调用实现分词功能
$res = $obj -> run($str, 10);

//打印结果
print_r($res);