<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>流程控制</title>
</head>
<body>
{{--if--}}
给大傻逼买个
@if ($total >= 90 && $total <= 100)
    游戏机
@elseif ($total >= 80 && $total < 90)
    PC
@elseif ($total >= 60 && $total < 80)
    pen
    @else
    nothing

@endif

</body>
</html>