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

Route::get('sport','SportController@index')->name('sport');
Route::get('sport/getdata','SportController@getdata')->name('sport.getdata');
Route::post('sport/postdata', 'SportController@postdata')->name('sport.postdata');
Route::get('sport/fetchdata', 'SportController@fetchdata')->name('sport.fetchdata');
Route::get('sport/removedata', 'SportController@removedata')->name('sport.removedata');

Route::get('sportreg','SportregController@index')->name('sportreg');
Route::get('sportreg/setstses', 'SportregController@setstses')->name('sportreg.setstses');
Route::get('sportreg/loadsports', 'SportregController@loadsports')->name('sportreg.loadsports');
Route::post('sportreg/savedata', 'SportregController@savedata')->name('sportreg.savedata');

Route::get('sportregman','SportregmanController@index')->name('sportregman');
Route::get('sportregman/getdata','SportregmanController@getdata')->name('sportregman.getdata');
Route::get('sportregman/acceptreg','SportregmanController@acceptreg')->name('sportregman.acceptreg');
Route::get('sportregman/declinereg','SportregmanController@declinereg')->name('sportregman.declinereg');
Route::get('sportregman/detailsreg','SportregmanController@detailsreg')->name('sportregman.detailsreg');

Route::get('eventadd','EventController@index')->name('eventadd');
Route::get('eventadd/getdata2','EventController@getdata2')->name('eventadd.getdata2');
Route::post('eventadd/postdata', 'EventController@postdata')->name('eventadd.postdata');
Route::get('eventadd/fetchdata', 'EventController@fetchdata')->name('eventadd.fetchdata');
Route::get('eventadd/removedata', 'EventController@removedata')->name('eventadd.removedata');

Route::get('eventview','EventViewController@index')->name('eventview');
Route::get('eventview/getdata','EventViewController@getdata')->name('eventadd.getdata');

Route::get('report','ReportController@index')->name('report');
Route::get('report/getdata','ReportController@getdata')->name('report.getdata');

// Route::get('/test', function () {
//     return view('add-ebook');
// });
// Route::get('/test2', function () {
//     return view('digital-library');
// });
// Route::get('/test3', function () {
//     return view('e-book');
// });