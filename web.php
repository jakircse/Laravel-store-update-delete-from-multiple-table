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

Route::get('/', 'PagesController@getHome');
Route::get('/staff', 'PagesController@getStaff');
Route::get('/contact', 'PagesController@getContact');
//Route::get('/info', 'PagesController@getIninfo');
Route::resource('basic_info', 'BasicinfoController');
Route::resource('staff', 'StaffController');
Route::get('tools', 'StaffController@tools');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
