<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function show()
    {
        echo 'show function';
    }

    // 用户编辑
    public function edit($id)
    {
        echo 'edit 函数, 用户的 id 为' . $id;
    }

    // 用户删除操作
    public function delete($id)
    {
//        echo "delete";
        // 通过别名创建url
        echo route('udelete', ['id' => 100]);
    }

    public function update()
    {
        echo 'update';
    }

    public function request(Request $request)
    {
        //echo "request";
        // 获取请求的方法
//        $method = $request->method();
//        echo $method;
//        echo "<br>";
//        // 获取请求的完整 url
//        $url = $request->url();
//        echo $url;
//        echo "<br>";
//        // 检测请求方式
//        $res = $request->isMethod('get');
//        var_dump($res);
//        echo "<br>";
//        // 检测请求的路径
//        $path = $request->path();
//        var_dump($path);
//        echo "<br>";
//        // 检测请求的ip
//        $ip = $request->ip();
//        echo $ip;
//        // 检测请求的端口
//        $port = $request->getPort();
//        var_dump($port);

        // 参数获取
//        $username = $request->input('username');
//        echo $username;
        // 设置默认值
//        $name = $request->input('name','gooin');
//        echo $name;
//        确认是否有输入值
//        $res = $request->has('username');
//        var_dump($res);
//        获取所有参数
//        $res = $request->all();
//        var_dump($res);
//        获取部分参数
//        $only = $request->only(['name', 'pwd']);
//        var_dump($only);
//            剔除不需要的参数
//        $except = $request->except(['name']);
//        var_dump($except);

//            获取请求头信息
        $res = $request->header('Cookie');
        var_dump($res);

    }

    public function form()
    {
        return view('user-form');
    }

    public function insert(Request $request)
    {
        // 获取表单中的用户名, 密码
        $username = $request->input('username');
        $password = $request->input('password');
        echo $username . ' , ' . $password;

    }

    // 显示 form 表单
    public function file()
    {
        return view('file');
    }

    public function upload(Request $request)
    {
        // 检测文件是否有上传
//        $res = $request->file('profile');
        if ($request->hasFile('profile')) {
            $request->file('profile')->move('./upload', 'helli.jpg');

        }
//        var_dump($res);
    }

    public function cookie(Request $request)
    {
        // 写入 cookie
//        cookie('name', 'gooin', 20);//时间单位为分钟
//        return response('')->withCookie(cookie('name', 'diuleiloumou', 20));

        // 读取Cookie
        $res = $request->cookie('name');
        var_dump($res);
    }

    public function flash()
    {
        return view('flash');
    }

    public function doFlash(Request $request)
    {
//        $all = $request->all();
//        var_dump($all);
        // 将请求的参数都闪存起来
        $request->flash();
        // 跳转到原来的页面重写参数
        return back();
    }

    public function old()
    {
        var_dump(old('name'));
    }

    public function response()
    {
        //返回字符串
//        return 'Hello';
        //返回并设置 cookie
//        return response('')->withCookie('name', 'gooin', 10);
        // 返回json
//        return response()->json(['name'=>'王大锤','age'=>25, 'location' => 'lanzhou']);
        // 下载文件
//        return response()->download('./images/404.gif');
        // 重定向
//        return redirect('http://gooin.xyz');
//        return redirect('/');
//         返回视图
//        return view('response');
        // 设置响应头
//        return response('')->header('name', 'gooin');
        // 设置返回内容并跳转
        return '支付成功
         <script>
            setTimeout(function() {
              location.href="/form";
            },3000)
        </script>';
    }

    // 视图
    public function view()
    {
        // 解析模板
//        return view('view');
        // 划分目录
//        return view('user.index');
        // 解析模板并分配数据
        $arr = ['name' => 'gooin', 'age' => 5, 'city' => 'lanzhou'];
        return view('user.user', $arr);
    }

    // blade 的使用
    public function blade()
    {
        // 路径分割使用 .
        return view('admin.index',
            [
                'title' => 'admin.index',
                'username1' => 'gooin',
                'page' => '<form action="/goods/insert" method="post">
                             {{ csrf_field() }}
                             <input type="text" name="username">
                                 <button>点击添加</button>
                            </form>'
            ]);
    }

    public function page()
    {
        // 解析模板
        return view('page.index',
            [
                'title' => 'Page'
            ]);
    }
    // blade 使用 @include 引入子元素
    public function cart()
    {
        return view('page.cart');
    }
    // blade 模板继承
    public function layout()
    {
        return view('layout.index');
    }
    public function extend()
    {
        return view('layout.extend');
    }
    // blade 流程控制
    public function liucheng()
    {
        return view('control.liucheng',
            [
               'total' => 64
            ]);
    }
    // 数据库操作
    public function db()
    {
//        查询
//        $res = DB::select('select * from users');
//        $res = DB::select('select * from articles where title = ?',['woc']);

//        插入
//        $res = DB::insert('insert into articles (title, body, user_id, created_at)
//                            values("我是标题","我是内容",1 , 1)');
//        $res = DB::insert('insert into articles (title, body) values(?, ?)',
//            ["我是新标题","我是新内容"]); //使用占位符
        // 更新
//        $res = DB::update('update articles set title = "我是id为10的新标题" where id = 10');
//        $res = DB::update('update articles set title = "我是id为9的新标题" where id = ?',[9]);

        // 删除
//        $res = DB::delete('delete from articles where id = 14');
//        $res = DB::delete('delete from articles where id = ?',[4]);

        // 一般语句
//         $res = DB::statement('create table sb (id int primary key auto_increment, name varchar(20))');
//        $res = DB::statement('drop table sb');
        //        var_dump($res);

        // 事务操作
        // 开启事务
//        $res = DB::update('update articles set user_id = user_id + 999 WHERE id = 5  ');
//        $res2 = DB::update('update articles set user_id = user_id - 1 WHERE id = 6');

//        if ($res && $res2) {
        // 事务提交
//            DB::commit();
//            echo "成功";
//        } else {
//            DB::rollBack();
//            echo "失败";
//        }

// 操作多个数据库
//        $res = DB::connection('mysql1')->select('select * from students');
//        var_dump($res);

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
        var_dump($arr);

    }
/*
 * 查询构造器
 */
    public function builder()
    {
        // 插入操作 (单条)
//        $res = DB::table('users')->insert([
//            'name' => 'gooin1',
//            'email' => 'goooinn@gmail.com'
//        ]);

        // 插入操作 (多条)
//        $res = DB::table('users')->insert([
//            ['name' => 'gooin2', 'email' => 'goooinn2@gmail.com'],
//            ['name' => 'gooin3', 'email' => 'goooinn3@gmail.com']
//        ]);

        // 插入并获取id
//        $res = DB::table('users')->insertGetId([
//            'name' => 'gooin4',
//            'email' => 'asdfa@asda.com'
//        ]);
//        返回的 id 保存在 $res

//        更新操作
//        $res = DB::table('users')->where('id',2)->update(['name'=>'updated','email'=>'update@email.com']);

//         删除操作
//        $res = DB::table('users')->where('id', '>', 4)->delete();

//        查询
//        $res = DB::table('users')->get(); //查询多条数据
//        $res = DB::table('users')->first(); // 查询单条数据

//        获取单个结果中的某个字段值
//        $res = DB::table('users')->value('email');

//        获取结果集中某个字段的所有值
//        $res = DB::table('users')->lists('email');

//        设置字段查询
//        $res = DB::table('users')->select('name', 'email')->get();

//        设置 where 条件
//        $res = DB::table('users')->where('name', '=', 'gooin2')->get();

//        orWhere 符合条件的都显示
//        $res = DB::table('users')->where('id', '=', 3)->orWhere('name', '=', 'gooin3')->get();

//        whereBetween 查询在范围内的数据
//        $res = DB::table('users')->whereBetween('id', [2, 4])->get();

//        whereIn 包含在指定数组内的
//        $res = DB::table('users')->whereIn('id', [1, 3, 4])->get();

//        排序(倒序)
//        $res = DB::table('users')->orderBy('id', 'desc')->get();

//        分页操作
//        $res = DB::table('users')->skip(2)->take(3)->get();
//
//        链接表
//        $res = DB::table('users')
//            ->join('articles', 'users.id', '=', 'articles.id')
//            ->get();

        // 运算
        //计算表中有多少条数据
        $res = DB::table('users')->count();
        //计算最大值
//        $res = DB::table('articles')->max('user_id');

//        SQL 语句记录

        dd($res);
    }

    public function model()
    {
        /*
         * 数据添加
         */
        // 创建模型对象
//        $goods = new \App\Models\Goods;
////        添加
//        $goods->title = "Google 玩偶";
//        $goods->text = "超级好看可爱的";
//        $goods->created_at = date('Y-m-d H:i:s');
//        $goods->updated_at = date('Y-m-d H:i:s');
//
//        $goods->save();

        /*
         * 读取
         */
//        $info = \App\Models\Goods::find(5);
//        // 读取
//        echo $info->title;
//        dd($info);

        /*
         * 删除
         */
//        $info = \App\Models\Goods::find(5);
//        // 删除 id 为5的字段
//        $info->delete();

        /*
         * 更新
         */
//        $info = \App\Models\Goods::find(4);
//        $info->title = 'Google 大法好';
//        $info->text = '我爱喝橙汁!';
//        $info->save();

        /*
         * 读取所有数据
         */
        // 之前的操作
        // DB:table('goods')->get();

        //
//        $data = Goods::get();
        $data = Goods::where('id','>','2')->get();
        dd($data);


    }

}
