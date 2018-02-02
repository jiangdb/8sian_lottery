<?php

use App\Models\LotteryUsers;
use Illuminate\Database\Seeder;

class TestLotteryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('truncate lottery_users');
        DB::statement('truncate winners;');
        $users = array();
        array_push($users, [
            'name' => '李贝娜',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 1,
        ], [
            'name' => '刘妍希',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 2,
        ], [
            'name' => '朱振宇',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 3,
        ], [
            'name' => '孙婧',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 4,
        ], [
            'name' => '苗振威',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 5,
        ], [
            'name' => '何可人',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 6,
        ], [
            'name' => '武伊婧',
            'password' => Hash::make('123456'),
            'card_no' => 7,
        ], [
            'name' => '戢新童',
            'password' => Hash::make('123456'),
            'card_no' => 8,
        ], [
            'name' => '范欢',
            'password' => Hash::make('123456'),
            'card_no' => 9,
        ], [
            'name' => '陈奕纯',
            'password' => Hash::make('123456'),
            'card_no' => 10,
        ], [
            'name' => '郑宁',
            'password' => Hash::make('123456'),
            'card_no' => 11,
        ], [
            'name' => '陈梓烨',
            'password' => Hash::make('123456'),
            'card_no' => 12,
        ], [
            'name' => '刘玉敏',
            'password' => Hash::make('123456'),
            'card_no' => 13,
        ], [
            'name' => '林嘉慧',
            'password' => Hash::make('123456'),
            'card_no' => 14,
        ], [
            'name' => '刘林佶',
            'password' => Hash::make('123456'),
            'card_no' => 15,
        ], [
            'name' => '李家源',
            'password' => Hash::make('123456'),
            'card_no' => 16,
        ], [
            'name' => '陈锐滔',
            'password' => Hash::make('123456'),
            'card_no' => 17,
        ], [
            'name' => '孙美洁',
            'password' => Hash::make('123456'),
            'card_no' => 18,
        ], [
            'name' => '谢苗馨',
            'password' => Hash::make('123456'),
            'card_no' => 19,
        ], [
            'name' => '田杭',
            'password' => Hash::make('123456'),
            'card_no' => 20,
        ], [
            'name' => '许仲豪',
            'password' => Hash::make('123456'),
            'card_no' => 21,
        ], [
            'name' => '王新洋',
            'password' => Hash::make('123456'),
            'card_no' => 22,
        ], [
            'name' => '田博文',
            'password' => Hash::make('123456'),
            'card_no' => 23,
        ], [
            'name' => '陈倩',
            'password' => Hash::make('123456'),
            'card_no' => 24,
        ], [
            'name' => '田俊龙',
            'password' => Hash::make('123456'),
            'card_no' => 25,
        ], [
            'name' => '区程坤',
            'password' => Hash::make('123456'),
            'card_no' => 26,
        ], [
            'name' => '关梦琦',
            'password' => Hash::make('123456'),
            'card_no' => 27,
        ], [
            'name' => '夏厅',
            'password' => Hash::make('123456'),
            'card_no' => 28,
        ], [
            'name' => '梁晴',
            'password' => Hash::make('123456'),
            'card_no' => 29,
        ], [
            'name' => '颜爽',
            'password' => Hash::make('123456'),
            'card_no' => 30,
        ], [
            'name' => '魏幸宇',
            'password' => Hash::make('123456'),
            'card_no' => 31,
        ], [
            'name' => '沈盈颖',
            'password' => Hash::make('123456'),
            'card_no' => 32,
        ], [
            'name' => '杨凱茜',
            'password' => Hash::make('123456'),
            'card_no' => 33,
        ], [
            'name' => '邹琳',
            'password' => Hash::make('123456'),
            'card_no' => 34,
        ], [
            'name' => '沈福美',
            'password' => Hash::make('123456'),
            'card_no' => 35,
        ], [
            'name' => '宋佳',
            'password' => Hash::make('123456'),
            'card_no' => 36,
        ], [
            'name' => '汤敏杰',
            'password' => Hash::make('123456'),
            'card_no' => 37,
        ], [
            'name' => '林诗洋',
            'password' => Hash::make('123456'),
            'card_no' => 38,
        ], [
            'name' => '吴颖',
            'password' => Hash::make('123456'),
            'card_no' => 39,
        ], [
            'name' => '刘露',
            'password' => Hash::make('123456'),
            'card_no' => 40,
        ], [
            'name' => '李武彬',
            'password' => Hash::make('123456'),
            'card_no' => 41,
        ], [
            'name' => '艾泽宇',
            'password' => Hash::make('123456'),
            'card_no' => 42,
        ], [
            'name' => '蒋东斌',
            'password' => Hash::make('123456'),
            'card_no' => 43,
        ], [
            'name' => '陈晓华',
            'password' => Hash::make('123456'),
            'card_no' => 44,
        ], [
            'name' => '卓魏国',
            'password' => Hash::make('123456'),
            'card_no' => 45,
        ], [
            'name' => '刘亚楠',
            'password' => Hash::make('123456'),
            'card_no' => 46,
        ], [
            'name' => '孙鼎',
            'password' => Hash::make('123456'),
            'card_no' => 47,
        ], [
            'name' => 'ANDREW',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 48,
        ], [
            'name' => '王政',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 49,
        ], [
            'name' => '尤智炜',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 50,
        ], [
            'name' => '吕祺',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 51,
        ], [
            'name' => '刘丽',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 52,
        ], [
            'name' => '徐珺如',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 53,
        ], [
            'name' => '潘照青',
            'password' => Hash::make('123456'),
            'allow_lottery' => 0,
            'card_no' => 54,
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
