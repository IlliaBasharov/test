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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/user-block', 'HomeController@blockUser')->middleware('admin');
Route::get('admin/user-block/{userId}', 'HomeController@blockedUser')->middleware('admin');
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('/user-update/{userId}', 'UserController@update');
