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

Route::group(['namespace' => '\App\Http\Controllers'], function () {
    Route::get('getToDo', 'TaskController@index');
    Route::post('createTask', 'TaskController@create');
    Route::delete('deleteTask', 'TaskController@delete');
    Route::put('updateStatus', 'TaskController@changeStatus');
});
