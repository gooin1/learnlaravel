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


| 动词	   |     路径	         |               行为（方法）|	路由名称 |
| ----      |      ----- |                 ------ |   -------- | 
| GET	    |    /photos	          |          index	   | photos.index |
| GET	    |     /photos/create	   |         create	  |  photos.create |
| POST	|    /photos	            |        store	   | photos.store |
| GET	     |    /photos/{photo}	    |    show	   | photos.show |
| GET	     |    /photos/{photo}/edit	|   edit	  |  photos.edit |
| PUT/PATCH |	/photos/{photo}         |	update	  |  photos.update |
| DELETE	  |  /photos/{photo}	     |       destroy 	| photos.destroy |

# 7请求
## 基本信息获取
```php
public function request(Request $request){
        //echo "request";
        // 获取请求的方法
        $method = $request->method();
        echo $method;
        echo "<br>";
        // 获取请求的完整 url
        $url = $request->url();
        echo $url;
        echo "<br>";
        // 检测请求方式
        $res = $request->isMethod('get');
        var_dump($res);
        echo "<br>";
        // 检测请求的路径
        $path = $request->path();
        var_dump($path);
        echo "<br>";
        // 检测请求的ip
        $ip = $request->ip();
        echo $ip;
        // 检测请求的端口
        $port = $request->getPort();
        var_dump($port);
    }
```
显示为
```html
GET
http://laravel.me/request
C:\wamp64\www\laravel\learnlaravel\laravel-v5.1.11\app\Http\Controllers\UserController.php:43:boolean true

C:\wamp64\www\laravel\learnlaravel\laravel-v5.1.11\app\Http\Controllers\UserController.php:47:string 'request' (length=7)

127.0.0.1
C:\wamp64\www\laravel\learnlaravel\laravel-v5.1.11\app\Http\Controllers\UserController.php:54:int 80
```
- 检测请求的方法
`$method = $request->method();`
- 检测请求方式
`$res = $request->isMethod('get);`
- 检测请求的路径
`$path = $request->path();`
- 检测请求的 url
`$url = $request->url();`
- 检测请求的 ip
`$ip = $request->ip();`
- 检测请求的端口
`$port = $request->getPort()`

## 提取请求参数
- 获取特定输入值
`$name = $request->input('name');`
...
更多用法在 [laravel文档](http://d.laravel-china.org/docs/5.1/requests)
## 上传文件
```php
public function file(Request $request) {
    if($request->file('name'){
        // 将上传的文件保存到 /upload 目录, 并赋予名字
        $request->file('name')->move('./upload','filename')
    }
}
```

## 设置 Cookie
```php
public function cookie(){
        //写入 cookie
        cookie('name', 'gooin', 20); //方法1.时间单位为分钟
        //方法2
//     return response('')->withCookie(cookie('name', 'diuleiloumou', 20));
        // 读取Cookie
        $res = $request->cookie('name');
        var_dump($res);

}
```
## 使用闪存
使用全局辅助函数 old 即可
```html
<form action="/flash" method="post">
    <input type="text" name="name" value="{{old('name')}}"><br>
    <input type="text" name="pwd" value="{{old('pwd')}}"><br>
    <input type="text" name="age" value="{{old('age')}}"><br>
    {{ csrf_field() }}
    <button>submit</button>
</form>
```







 