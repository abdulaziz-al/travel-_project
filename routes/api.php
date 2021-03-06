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
Route::get('getjob','AdminController@getjob');
Route::post('createjob','AdminController@createjob');

Route::get('getEmp','AdminController@getEmp');
Route::put('updateemp/{empid}','AdminController@updateemp');
Route::get('/search{name}','AdminController@search');



Route::post('store_file', 'AdminController@fileStore');

Route::post('image/store','AdminController@store');
