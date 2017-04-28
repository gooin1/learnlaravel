<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration
{
    /**
     * Run the migrations.
     * 执行迁移
     * @return void
     */
    public function up()
    {
        // 检测是否存在 test 表
        if (!Schema::hasTable('test')) {
            //
            Schema::create('test', function (Blueprint $table) {
                // 创建主键字段
                $table->increments('id');
                // 创建用户名字段
                $table->string('username')->nullable()->default('abc')->comment('用户名');
                // 创建密码字段
                $table->string('password');
                // 添加新字段
                $table->string('nickname');
            });
        } else {
            /*
             * 在对已有数据的表添加字段
             * down 函数留空
             */
            // 如果表存在的话, 调整表结构
            Schema::table('test', function ($table) {
                // 添加
                if (!Schema::hasColumn('test','weibo')) {
                    $table->string('weibo')->comment('微博');
                }
                if (!Schema::hasColumn('test','email')) {
                    $table->string('email')->comment('邮箱');
                }
                /*
                 * 修改字段
                 * 在修改字段之前，请务必在你的 composer.json 中增加 doctrine/dbal 依赖。
                 * Doctrine DBAL 函数库被用于判断当前字段的状态以及创建调整指定字段的 SQL 查询。
                 */
                $table->text('nickname')->change();
            });
        }
    }
    /**
     * Reverse the migrations.
     * 执行回滚
     * @return void
     */
    public function down()
    {
        //
//        Schema::drop('test');
    }
}
