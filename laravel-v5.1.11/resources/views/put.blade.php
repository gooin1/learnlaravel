<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/update" method="post">
    名字: <input type="text" name="username">
    <br>
    密码: <input type="password" name="password">
    <br>
    {{--方法欺骗, 模拟 put 请求--}}
    <input type="hidden" name="_method" value="PUT">
    <input type="submit" name="submit">
    {{--隐藏域，防止csrf攻击--}}
    {{ csrf_field() }}
</form>
</body>
</html>