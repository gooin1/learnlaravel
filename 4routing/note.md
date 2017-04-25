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
