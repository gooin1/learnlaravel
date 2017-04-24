<?php 

	//创建连接
	$fp = fsockopen('apistore.baidu.com',80, $errno, $errstr, 10);

	if(!$fp) {
		echo $errstr;die;
	}

	//
	$http = '';

	//请求行
	$http .= "GET /microservice/weather HTTP/1.1\r\n";

	//请求头
	$http .= "Host: apistore.baidu.com\r\n";
	$http .= "Connection: close\r\n\r\n";
	$http .= "citypinyin: beijing\r\n\r\n";

	//发送
	fwrite($fp, $http);

	//获取结果
	$res = '';

	while(!feof($fp)) {
		$res .= fgets($fp);
	}

	echo $res;


 ?>