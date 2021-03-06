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
    Route::get('setting', 'LotteryController@setting')->name('setting');
    Route::put('setting', 'LotteryController@storeSetting')->name('store_setting');
    Route::get('winners', 'LotteryController@winners')->name('winners');
    Route::get('users', 'LotteryController@users')->name('users');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('user.index');
Route::post('/users', 'UserController@setUserIfAllowLottery')->name('user.set_user_allow_lottery');

Route::get('/winners', 'UserController@winners')->name('winners');