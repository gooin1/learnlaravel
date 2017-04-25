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
<form action="/article/20" method="post">
    <input type="text" name="title">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <button>点击提交</button>
</form>

<form action="/article/300" method="post">
    <input type="text" name="title">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}
    <button>点击删除</button>
</form>
</body>
</html>