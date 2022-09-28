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

// Route::get('/', function () {
//     return view('blogs');
// });

Route::get('/', 'App\Http\Controllers\BlogController@getIndex');
Route::get('/blogs', 'App\Http\Controllers\BlogController@getIndex');

Route::get('/add', 'App\Http\Controllers\BlogController@getAdd');

Route::post('/add', 'App\Http\Controllers\BlogController@postAdd');

Route::get('edit/{id}', 'App\Http\Controllers\BlogController@getEdit');

Route::post('edit/{id}', 'App\Http\Controllers\BlogController@postEdit');

Route::get('/toggle/{id}', 'App\Http\Controllers\BlogController@getToggle');

Route::get('/delete/{id}', 'App\Http\Controllers\BlogController@getDelete');
