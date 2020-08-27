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

Route::get('period','PeriodController@index')->name('period');
Route::get('period/loaddata','PeriodController@loaddata')->name('period.loaddata');
Route::post('period/postdata','PeriodController@postdata')->name('period.postdata');
Route::get('period/getdata','PeriodController@getdata')->name('period.getdata');
Route::get('period/fetchdata','PeriodController@fetchdata')->name('period.fetchdata');
Route::get('period/removedata','PeriodController@removedata')->name('period.removedata');

Route::get('exam','ExamController@index')->name('exam');
Route::get('exam/loaddata','ExamController@loaddata')->name('exam.loaddata');
Route::get('exam/getdata','ExamController@getdata')->name('exam.getdata');
Route::post('exam/postdata','ExamController@postdata')->name('exam.postdata');
Route::get('exam/fetchdata','ExamController@fetchdata')->name('exam.fetchdata');
Route::get('exam/removedata','ExamController@removedata')->name('exam.removedata');

Route::get('timetable','TimetableController@index')->name('timetable');
Route::get('timetable/getdata','TimetableController@getdata')->name('timetable.getdata');
