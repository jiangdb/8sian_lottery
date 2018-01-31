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
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/zeldman/128.jpg',
        ], [
            'name' => 'user2',
            'password' => Hash::make('123456'),
            'avatar' => 'http://www.piedpiper.com/app/themes/pied-piper/dist/images/richard.png',
        ], [
            'name' => 'user3',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/faulknermusic/128.jpg',
        ], [
            'name' => 'user4',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/iannnnn/128.jpg',
        ], [
            'name' => 'user5',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/sauro/128.jpg',
        ], [
            'name' => 'user6',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/k/128.jpg',
        ], [
            'name' => 'user7',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg',
        ], [
            'name' => 'user8',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg',
        ], [
            'name' => 'user9',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/iflendra/128.jpg',
        ], [
            'name' => 'user10',
            'password' => Hash::make('123456'),
            'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg',
        ]);

        foreach ($users as $user) {
            LotteryUsers::create($user);
        }
    }
}
