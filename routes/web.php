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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@welcome');
Route::get('/CreateEmploye','AdminController@CreateEmploye');

Route::get('/ShowEmploye','AdminController@ShowEmploye');

Route::post('/Addmember','AdminController@Addmember')->name('Addmember');
//// for test fucntions day 1 HR functions 
Route::post('/newJobs','AdminController@newJobs')->name('newJobs');
Route::post('/overSalary','AdminController@overSalary')->name('overSalary');
Route::post('/userOver','AdminController@userOver')->name('userOver');
