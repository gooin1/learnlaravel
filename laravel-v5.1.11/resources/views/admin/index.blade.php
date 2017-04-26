<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--使用变量--}}
    <title>{{$title}}</title>
</head>
<body>
{{--使用函数--}}
当前时间: {{time()}}<br>
当前日期: {{date('Y-m-d H:i:s')}}<br>
<hr>
{{--使用默认值--}}
欢迎: {{$username or '大傻逼'}}<br>
<hr>
{{--显示未转义的数据--}}
page: {!! $page !!}<br>


</body>
</html>