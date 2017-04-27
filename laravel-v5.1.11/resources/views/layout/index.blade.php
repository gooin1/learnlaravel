<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    @yield('title')标记, 单标记占位 --}}
    <title>Title - @yield('title')</title>
</head>
<body>

<div style="height:200px;background: cyan">Header</div>
{{--标记为 content--}}
@section('content')
    <div style="height:500px;background: orangered">content</div>
@show

{{--标记为 footer--}}
@section('footer')
<div style="height:200px;background: greenyellow">footer</div>
@show

{{--空标记    --}}
@section('js')
@show

</body>
</html>