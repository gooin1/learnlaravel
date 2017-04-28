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
