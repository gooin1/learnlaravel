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

# 8 响应
在官网文档/代码中注释
# 9 blade模板
在官网文档/代码中注释
# 10 数据库基本操作
在官网文档/代码中注释
# 11 数据库迁移
## 生成迁移
laravel 路径在在 cmd 中打开, 执行命令
 `php artisan make:migration test`
 生成的迁移文件保存在 `database/migration` 目录中
 ## 修改迁移结构
 打开刚才创建好的文件 `laravel-v5.1.11/database/migrations/2017_04_28_001755_test.php`
 里面会包含两个方法: `up`和`down`.
 up 方法可为数据库增加新的数据表、字段、或索引，而 down 方法则可简单的反向运行 up 方法的操作。
 ```php
public function up()
    {
        // 创建一个 test 表
        Schema::create('test', function (Blueprint $table) {
            // 创建主键字段
            $table->increments('id');
            // 创建用户名字段
            $table->string('username')->nullable()->default('abc')->comment('用户名');
            // 创建密码字段
            $table->string('password');
        });
    }
    
public function down()
    {
        // 删除表
        Schema::drop('test');
    }
```

## 运行迁移
### 创建表
在命令行执行 `php artisan migrate` 

![php-migrate.png](https://ooo.0o0.ooo/2017/04/28/59021d37e94da.png)

运行成功后查看数据库

![php-migrated.png](https://ooo.0o0.ooo/2017/04/28/59021d3ca2f80.png)

### 更新表
执行 `php artisan migrate:refresh`

![php-migrate-refresh.png](https://ooo.0o0.ooo/2017/04/28/590289c50ea86.png)

# 数据库填充
Laravel 可以简单的使用 seed 类来给数据库填充测试数据。
## 编写数据填充
命令行执行 ` php artisan make:seeder testSeeder`

![php-make-seeder.png](https://ooo.0o0.ooo/2017/04/28/5902ddf92da06.png)

执行成功后的文件保存在 `database/seeds/` 下

![php-seeder.png](https://ooo.0o0.ooo/2017/04/28/5902ddf80b00d.png)

在 `testSeeder.php` 的 `run` 函数下填写填充的数据
```php
<?php

use Illuminate\Database\Seeder;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = [];
        //循环
        for ($i = 0; $i < 20; $i++) {
            $tmp = [];
            $tmp['username'] = str_random(6);
            $tmp['password'] = str_random(10);
            $tmp['nickname'] = 'Cool-' . str_random(6);
            $tmp['weibo'] = '@' . str_random(6);
            $tmp['email'] = rand(10000000, 999999999) . '@qq.com';
            // 压入到数组中
            $arr[] = $tmp;

        }
            // 插入
            DB::table('test')->insert($arr);

    }
}


```

## 运行数据填充
命令行运行
`php artisan db:seed --class=testSeeder`

在数据库中查看结果

![aphp-seeded.png](https://ooo.0o0.ooo/2017/04/28/5902e3b95c05d.png)

# *Laravel从零开始创建数据库示例数据
在命令行从进入到laravel文件目录
### 创建注入文件
在命令行执行 

`php artisan make:migration post`

![php artisan make:migration post](https://ooo.0o0.ooo/2017/04/28/5902ef35a21dd.png)

### 书写数据库注入代码
在 `database/migtations` 目录下找到 `201x_xx_xx_xxxxxx_post.php` 文件, 打开
后写好注入代码:

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->string('text');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('posts');
    }
}

```

### 运行迁移
命令行执行

`php artisan migrate`

执行后在数据库查看结果

![database](https://ooo.0o0.ooo/2017/04/28/5902ef369e5e7.png)

### 编写数据填充
命令行执行

`php artisan make:seeder postSeeder`

执行后在 `database/seeds` 目录下找到 `postSeeder.php`
对照数据库表结构添加代码:

```php
<?php

use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        // 循环
        for ($i = 0; $i < 20; $i++){
            $tmp = [];
            $tmp['title'] = 'Title-' . str_random(6) .'-'. $i;
            $tmp['text'] = 'Content-' . str_random(100) .'-'. $i;
            $tmp['created_at'] = date('Y-m-d H:i:s');
            $tmp['updated_at'] = date('Y-m-d H:i:s');

            $data[] = $tmp;
        }
        // 插入
        DB::table('posts')->insert($data);
    }
}

```

### 填充
找到和 `postSeederphp` 同目录下的 `DatabaseSeeder.php`
在 run 函数下添加我们的 seeder 类
```php
 public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        // 添加我们的 postSeeder 类
         $this->call(postSeeder::class);

        Model::reguard();
    }
```

命令行执行

`php artisan migrate:refresh --seed`

![php artisan migrate:refresh --seed](https://ooo.0o0.ooo/2017/04/28/5902ef3841711.png)

在数据库中查看

![Seeded: postSeeder](https://ooo.0o0.ooo/2017/04/28/5902ef39e434c.png)

大功告成! 

# 模型

创建模型
命令行执行 `php artisan make:model Models/Goods`


































 