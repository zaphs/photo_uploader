<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function(){
	return response()->json(null, 204);
})->name('api');

Route::post('upload', 'ApiPhotoController@upload')->name('upload');

Route::put('rename', 'ApiPhotoController@changeName')->name('rename');

Route::delete('delete', 'ApiPhotoController@remove')->name('delete');

Route::get('list', 'ApiPhotoController@all')->name('list');