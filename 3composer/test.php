<?php

$str = '什么时候有女朋友啊';
//$res = substr($str,0, 5);
$res = mb_substr($str,0, 5,'utf-8');
echo $res;