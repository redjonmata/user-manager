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

Route::get('/', 'HomeController@index');
Route::put('/users/{id}', 'HomeController@update');
Route::delete('/users/{id}', 'HomeController@delete');
Route::get('/add-user', 'HomeController@show')->middleware('admin');
Route::post('/add-user', 'HomeController@store')->middleware('admin');
