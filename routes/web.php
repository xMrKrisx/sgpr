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

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/testform', "HomeController@getForm")->name('testform');
Route::post('sendPDF', 'HomeController@processForm'); // Hier vangen we de XHR Request af.
