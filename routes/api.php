<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/ping',function(){
    return ['pong' => true];
});

Route::get('/person','PersonController@all');
Route::get('/person/{id}','PersonController@one');
Route::post('/person','PersonController@new');
Route::put('/person/{id}','PersonController@edit');
Route::delete('/person/{id}','PersonController@delete');