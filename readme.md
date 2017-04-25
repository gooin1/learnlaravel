# Laravel 5.1 速查表
[Laravel 5.1 速查表](https://cs.laravel-china.org/#)
----

# 4路由
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

# 5中间件 `MiddleWare`

在 laravel 目录下打开命令行,执行
`php artisan make:middleware LoginMiddleware`

## 默认存放目录
 `app/Http/Middleware/`
## `$request` 是 laravel 对请求报文做的封装

# 6控制器 `Controller`
在 laravel 目录下打开命令行,执行
`php artisan make:controller TestController`
或者
`php artisan make:controller TestController --plain`

## 错误信息
```
BadMethodCallException in Controller.php line 283:
Method [show] does not exist.
```
当前控制器下没有声明该方法

## 路由及访问 
### 普通访问
`Route::get('/controller','UserController@show');`

`UserController`为控制器的名字, `show` 为方法名
### 带参数访问
` Route::get('/user/{id}/edit','UserController@edit');`
### 控制器中间件
```php
    Route::get('/admin/user/update', [
        'middleware' => 'login',
        'uses' => 'UserController@update'
    ]);
```
### 隐式控制器
#### 创建路由规则
`Route::controller('goods', 'GoodsController');`
所有的`goods`开头的路由都由`GoodsController`控制
#### GET /goods/add HTTP/1.1
此时执行 `GoodsController` 下的 `getAdd` 方法

#### POST /goods/insert HTTP/1.1
此时执行 `GoodsController` 下的 `postInsert` 方法

### RESTful 资源控制器
快速创建
`php artisan make:controller ArticleController`
路由规则
`Route::resource('article', 'ArticleController');`


动词	        路径	                        行为（方法）	路由名称
GET	        /photos	                    index	    photos.index
GET	         /photos/create	            create	    photos.create
POST	    /photos	                    store	    photos.store
GET	         /photos/{photo}	        show	    photos.show
GET	         /photos/{photo}/edit	    edit	    photos.edit
PUT/PATCH	/photos/{photo}         	update	    photos.update
DELETE	    /photos/{photo}	            destroy 	photos.destroy





 