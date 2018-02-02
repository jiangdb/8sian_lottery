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
            'name' => '潘照青',
            'password' => Hash::make('123456'),
        ], [
            'name' => '孙鼎',
            'password' => Hash::make('123456'),
        ], [
            'name' => '蒋东斌',
            'password' => Hash::make('123456'),
        ], [
            'name' => '刘亚楠',
            'password' => Hash::make('123456'),
        ], [
            'name' => '陈晓华',
            'password' => Hash::make('123456'),
        ], [
            'name' => '卓卫国',
            'password' => Hash::make('123456'),
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
