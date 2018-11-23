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

Route::get('/reg35', 'RoomRegisterController@index')->name('room-register');
Route::get('/reg35/success', 'RoomRegisterController@indexSuccess')->name('room-register-success');
Route::post('/reg35', 'RoomRegisterController@registerRoom');

Route::prefix('home')->group(function (){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search-room', 'HomeController@searchRoom')->name('home.searchRoom');
    Route::get('/edit-room/{id}', 'HomeController@editRoom')->name('home.editRoom');

    Route::post('/edit-room', 'HomeController@saveRoom')->name('home.saveRoom');

    Route::post('/remove-room', 'HomeController@removeRoom')->name('home.removeRoom');
    Route::post('/change-room-number', 'HomeController@changeRoomNumber')->name('home.changeRoomNumber');
});