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
Route::get('/admin', 'AdminHomeController@index')->name('admin-home');
Route::resource('/admin/cinema', 'CinemaController');
Route::get('/admin/cinema.data', 'CinemaController@anyData')->name('cinema.data');
