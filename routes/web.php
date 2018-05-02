<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/blake', 'ExchangeController@index');

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');


/* Notifiers */
Route::post('/notify', 'NotifyController@index');
Route::post('/notify/store', 'NotifyController@store');
Route::post('/notify/update', 'NotifyController@update');
Route::post('/notify/delete', 'NotifyController@destroy');


/* Phones */
Route::post('phone', 'PhoneController@store');
Route::put('/settings/profile/phone', 'PhoneController@update');

Route::put('/settings/profile/details', 'PhoneController@update');
