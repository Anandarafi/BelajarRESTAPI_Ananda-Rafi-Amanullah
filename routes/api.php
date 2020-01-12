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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/prestasi','PrestasiController@create')->middleware('jwt.verify');

Route::get('/prestasi',"PrestasiController@index")->middleware('jwt.verify');


Route::post('/siswa',"SiswaController@create")->middleware('jwt.verify');

Route::put('/siswa/{id}',"SiswaController@update")->middleware('jwt.verify');

Route::delete('/siswa/{id}',"SiswaController@delete")->middleware('jwt.verify');

Route::get('/siswa',"SiswaController@index")->middleware('jwt.verify');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('book', 'BookController@book');
Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');