<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContactsController@index');
Route::get('/create', 'ContactsController@create');
Route::post('/create', 'ContactsController@store');
Route::get('/destroy/{id}', 'ContactsController@confirmDestroy');
Route::delete('/destroy/{id}', 'ContactsController@destroy');
Route::get('/edit/{id}', 'ContactsController@edit');
Route::put('/edit/{id}', 'ContactsController@update');
Route::get('/settings', 'ContactsController@settings_show');
Route::post('/settings', 'ContactsController@settings_store');
