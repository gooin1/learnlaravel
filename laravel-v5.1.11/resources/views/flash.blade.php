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
<form action="/flash" method="post">
    <input type="text" name="name" value="{{old('name')}}"><br>
    <input type="text" name="pwd" value="{{old('pwd')}}"><br>
    <input type="text" name="age" value="{{old('age')}}"><br>
    {{ csrf_field() }}
    <button>submit</button>
</form>
</body>
</html>