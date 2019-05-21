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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/التحكم','AdminController@index')->name('viewfile');
route::get('/التحكم/تحميل','AdminController@create')->name('formfile');
route::get('/حجز/{id}','HomeController@reservation')->name('reservation');
route::post('/حجز/{id}','HomeController@store')->name('saveinfo');
route::post('/reservationdetail','HomeController@showinfo')->name('showinfo');




route::post('/التحكم/تحميل','AdminController@store')->name('uploadfile');
route::post('/التحكم/{ids}','AdminController@destroy')->name('delete');
route::get('/التحكم/{id}','AdminController@view')->name('view');
route::post('/التحكم','AdminController@plus')->name('pulsSalary');