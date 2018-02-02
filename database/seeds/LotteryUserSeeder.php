<?php

use App\Models\LotteryUsers;
use Illuminate\Database\Seeder;

class LotteryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('truncate lottery_users');
        $users = array();
        array_push($users, [
            'name' => '李贝娜',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '刘妍希',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '朱振宇',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '孙婧',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '苗振威',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '何可人',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '武伊婧',
            'password' => Hash::make('123456'),
        ], [
            'name' => '戢新童',
            'password' => Hash::make('123456'),
        ], [
            'name' => '范欢',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈奕纯',
            'password' => Hash::make('123456'),
        ], [
            'name' => '郑宁',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈梓烨',
            'password' => Hash::make('123456'),
        ], [
            'name' => '刘玉敏',
            'password' => Hash::make('123456'),
        ], [
            'name' => '林嘉慧',
            'password' => Hash::make('123456'),
        ], [
            'name' => '刘林佶',
            'password' => Hash::make('123456'),
        ], [
            'name' => '李家源',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈锐滔',
            'password' => Hash::make('123456'),
        ], [
            'name' => '孙美洁',
            'password' => Hash::make('123456'),
        ], [
            'name' => '谢苗馨',
            'password' => Hash::make('123456'),
        ], [
            'name' => '田杭',
            'password' => Hash::make('123456'),
        ], [
            'name' => '许仲豪',
            'password' => Hash::make('123456'),
        ], [
            'name' => '王新洋',
            'password' => Hash::make('123456'),
        ], [
            'name' => '田博文',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈倩',
            'password' => Hash::make('123456'),
        ], [
            'name' => '田俊龙',
            'password' => Hash::make('123456'),
        ], [
            'name' => '区程坤',
            'password' => Hash::make('123456'),
        ], [
            'name' => '关梦琦',
            'password' => Hash::make('123456'),
        ], [
            'name' => '夏厅',
            'password' => Hash::make('123456'),
        ], [
            'name' => '梁晴',
            'password' => Hash::make('123456'),
        ], [
            'name' => '颜爽',
            'password' => Hash::make('123456'),
        ], [
            'name' => '魏幸宇',
            'password' => Hash::make('123456'),
        ], [
            'name' => '沈盈颖',
            'password' => Hash::make('123456'),
        ], [
            'name' => '杨凱茜',
            'password' => Hash::make('123456'),
        ], [
            'name' => '邹琳',
            'password' => Hash::make('123456'),
        ], [
            'name' => '沈福美',
            'password' => Hash::make('123456'),
        ], [
            'name' => '宋佳',
            'password' => Hash::make('123456'),
        ], [
            'name' => '汤敏杰',
            'password' => Hash::make('123456'),
        ], [
            'name' => '林诗洋',
            'password' => Hash::make('123456'),
        ], [
            'name' => '吴颖',
            'password' => Hash::make('123456'),
        ], [
            'name' => '刘露',
            'password' => Hash::make('123456'),
        ], [
            'name' => '李武彬',
            'password' => Hash::make('123456'),
        ], [
            'name' => '艾泽宇',
            'password' => Hash::make('123456'),
        ], [
            'name' => '蒋东斌',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈晓华',
            'password' => Hash::make('123456'),
        ], [
            'name' => '卓魏国',
            'password' => Hash::make('123456'),
        ], [
            'name' => '刘亚楠',
            'password' => Hash::make('123456'),
        ], [
            'name' => '孙鼎',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'BOLEI',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => 'ANDREW',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '王政',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '尤智炜',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '吕祺',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '刘丽',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ], [
            'name' => '徐珺如',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
