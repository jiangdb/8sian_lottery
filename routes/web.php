<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/lottery', 'as' => 'lottery.'], function () {
    Route::get('start', 'LotteryController@checkIfStart')->name('check_start');
    Route::post('start', 'LotteryController@setStart')->name('set_start');
    Route::post('stop', 'LotteryController@setStop')->name('set_stop');
    Route::get('winners', 'LotteryController@currentWinners')->name('current_winners');
});