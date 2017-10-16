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
Route::get('/', 'DashboardController@index');

Auth::routes();

Route::resource('dashboard', 'DashboardController');
Route::resource('departure', 'DepartureController');
Route::resource('student', 'StudentController');
Route::resource('company', 'CompanyController');
Route::resource('letter', 'LetterController');

Route::get('resource/company-data', 'CompanyController@data');
Route::get('resource/departure-data', 'DepartureController@data');
Route::get('resource/student-data', 'StudentController@data');
Route::get('resource/letter-data', 'LetterController@data');
