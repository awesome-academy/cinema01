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
// Home page
Route::get('/', 'HomeController@index')->name('home');
Route::resource('movie', 'MovieController');
Route::get('now-showing', 'MovieController@nowShowing')->name('now-showing');
Route::get('comming-soon', 'MovieController@commingSoon')->name('comming-soon');
Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminHomeController@index')->name('admin-home');
    Route::resource('cinema', 'CinemaController');
    Route::resource('room', 'RoomController');
    Route::resource('seat_type', 'SeatTypeController');
    Route::resource('room_type', 'RoomTypeController');
    Route::resource('seat_price', 'SeatPriceController');
    Route::resource('seat', 'SeatController');
    Route::resource('seat_col', 'SeatColController');
    Route::resource('movie', 'MovieController');
});
