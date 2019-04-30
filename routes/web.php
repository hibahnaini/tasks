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
use App\Task;
Route::get('/','TaskController@load');
Route::post('/task','TaskController@create');

Route::post('done','TaskController@done');
Route::post('undone','TaskController@undone');
