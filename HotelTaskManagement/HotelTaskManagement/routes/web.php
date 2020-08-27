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

Route::get('test','TestController@index')->name('test');
Route::get('test/getdata','TestController@getdata')->name('test.getdata');

Route::get('task','TaskController@index')->name('task');
Route::get('task/getdata','TaskController@getdata')->name('task.getdata');
Route::post('task/postdata', 'TaskController@postdata')->name('task.postdata');
Route::get('task/fetchdata', 'TaskController@fetchdata')->name('task.fetchdata');
Route::get('task/removedata', 'TaskController@removedata')->name('task.removedata');
Route::get('task/complete', 'TaskController@complete')->name('task.complete');
Route::get('taskreport', 'TaskController@taskreport')->name('taskreport');
Route::get('taskreport/viewreport', 'TaskController@viewreport')->name('taskreport.viewreport');

Route::get('session','SessionController@index')->name('session');
Route::get('session/getdata','SessionController@getdata')->name('session.getdata');
Route::post('session/postdata', 'SessionController@postdata')->name('session.postdata');
Route::get('session/fetchdata', 'SessionController@fetchdata')->name('session.fetchdata');
Route::get('session/removedata', 'SessionController@removedata')->name('session.removedata');
Route::get('session/complete', 'SessionController@complete')->name('session.complete');
Route::get('sessionreport', 'SessionController@sessionreport')->name('sessionreport');
Route::get('sessionreport/viewreport', 'SessionController@viewreport')->name('sessionreport.viewreport');

Route::get('room','RoomController@index')->name('room');
Route::get('room/getdata','RoomController@getdata')->name('room.getdata');
// Route::post('room/getdata','RoomController@getdata')->name('room.getdata');
Route::get('room/reserve','RoomController@reserve')->name('room.reserve');