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

