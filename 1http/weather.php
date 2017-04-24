<?php
// create link
$fp = fsockopen('free-api.heweather.com', 80, $errno, $errstr, 10);


// test
if(!$fp){
    echo $errstr;die;
}

//
$http = '';
// hang
$http .= "GET /v5/weather?city=lanzhou&key=21344952b30d4e508ccd0fa99bbd9352 HTTP/1.1\r\n";

// body
$http .= "Host: free-api.hweather.com\r\n";
$http .= "Connection: close\r\n\r\n";
//$http .= "city: lanzhou\r\n";
//$http .= "key: 21344952b30d4e508ccd0fa99bbd9352\r\n\r\n";

fwrite($fp, $http);

$res = '';
while(!feof($fp)){
  $res .= fgets($fp);
}

echo $res;
?>
