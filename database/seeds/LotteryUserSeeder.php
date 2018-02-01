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
            'name' => 'user1',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user2',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user3',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user4',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user5',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user6',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user7',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user8',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user9',
            'password' => Hash::make('123456'),
        ], [
            'name' => 'user10',
            'password' => Hash::make('123456'),
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
