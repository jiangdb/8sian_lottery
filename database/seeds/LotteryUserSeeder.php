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
        $users = array();
        array_push($users, [
            'name' => 'user1',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user2',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user3',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user4',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user5',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user6',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user7',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user8',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user9',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ], [
            'name' => 'user10',
            'password' => Hash::make('123456'),
            'avatar' => '',
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
