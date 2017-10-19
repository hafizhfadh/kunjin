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
Route::resource('company', 'CompanyController');
Route::resource('letter', 'LetterController');
Route::resource('student', 'StudentController');

Route::post('student/importExcel', 'StudentController@importExcel');
Route::get('student/exportExcel/{type}', 'StudentController@exportExcel');

Route::post('company/importExcel', 'CompanyController@importExcel');
Route::get('company/exportExcel/{type}', 'CompanyController@exportExcel');

Route::prefix('/student')->group(function () {
  // Login Routes
  Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
  Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
  Route::get('/logout', 'Auth\StudentLoginController@logout')->name('student.logout');
  // Password Reset routes
  Route::post('/password/email', 'Auth\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
  Route::get('/password/reset', 'Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
  Route::post('/password/reset', 'Auth\StudentResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\StudentResetPasswordController@showResetForm')->name('student.password.reset');
});

Route::get('resource/company-data', 'CompanyController@data');
Route::get('resource/departure-data', 'DepartureController@data');
Route::get('resource/student-data', 'StudentController@data');
Route::get('resource/letter-data', 'LetterController@data');
