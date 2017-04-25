# 路由
是将信息源地址传递到目的地的角色
## 注意点
```php
Route::get('/test', function() {
    echo 'test';
}); //这里分号别忘了
```
## 报错信息
 `MethodNotAllowedHttpException in RouteCollection.php line 219:`
 当前请求方式和路由规则的请求方式不匹配
## laravel 所有的模板文件存放在 `Resources/views` 下
## 模板文件后缀名是 `.blade.php`
## 错误信息
`TokenMismatchException in VerifyCsrfToken.php line 53:`
说明在当前 post 请求中缺少验证信息
在每个 post 表单需要添加隐藏域来完成请求
## 模拟 put 请求
```html
<form action="/update" method="post">
    名字: <input type="text" name="username">
    <br>
    密码: <input type="password" name="password">
    <br>
    <!--方法欺骗, 模拟 put 请求-->
    <input type="hidden" name="_method" value="PUT">
    <input type="submit" name="submit">
    {{--隐藏域，防止csrf攻击--}}
    {{ csrf_field() }}
</form>
```
## 错误信息
`NotFoundHttpException in RouteCollection.php line 161:`
路由规则没有匹配请求路径
比如限制请求参数为数字, 如果填了字母就报此错误
