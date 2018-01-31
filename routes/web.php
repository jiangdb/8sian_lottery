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
})->middleware('auth');

Route::group(['prefix' => '/lottery', 'as' => 'lottery.', 'middleware' => 'auth'], function () {
    Route::get('start', 'LotteryController@checkIfStart')->name('check_start');
    Route::put('start', 'LotteryController@setStart')->name('set_start');
    Route::put('stop', 'LotteryController@setStop')->name('set_stop');
    Route::get('winners', 'LotteryController@currentWinners')->name('current_winners');
    Route::get('setting', 'LotteryController@setting')->name('setting');
    Route::put('setting', 'LotteryController@storeSetting')->name('store_setting');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
