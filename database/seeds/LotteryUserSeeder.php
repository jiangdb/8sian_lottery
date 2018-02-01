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
            'card_no' => 1,
        ], [
            'name' => 'user2',
            'password' => Hash::make('123456'),
            'card_no' => 2,
        ], [
            'name' => 'user3',
            'password' => Hash::make('123456'),
            'card_no' => 3,
        ], [
            'name' => 'user4',
            'password' => Hash::make('123456'),
            'card_no' => 4,
        ], [
            'name' => 'user5',
            'password' => Hash::make('123456'),
            'card_no' => 5,
        ], [
            'name' => 'user6',
            'password' => Hash::make('123456'),
            'card_no' => 6,
        ], [
            'name' => 'user7',
            'password' => Hash::make('123456'),
            'card_no' => 7,
        ], [
            'name' => 'user8',
            'password' => Hash::make('123456'),
            'card_no' => 8,
        ], [
            'name' => 'user9',
            'password' => Hash::make('123456'),
            'card_no' => 9,
        ], [
            'name' => 'user10',
            'password' => Hash::make('123456'),
            'card_no' => 10,
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
