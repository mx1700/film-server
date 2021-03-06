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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::resource('films', 'FilmController');
Route::resource('films/{film}/events', 'EventController');
Route::resource('films/{film}/locationCards', 'LocationCardController');
Route::resource('events/{event}/barrages', 'BarrageController');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

$this->get('/auth/change-password', 'Auth\ChangePasswordController@showForm')->name('change-password');
$this->post('/auth/change-password', 'Auth\ChangePasswordController@changePassword');

Route::get('/conf/help', 'HelpConfController@index')->name('conf.help');
Route::post('/conf/help', 'HelpConfController@update');

Route::get('/feedback', 'FeedbackController@index')->name('feedback');

Route::get('/about', 'AboutController@index');

