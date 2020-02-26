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

Route::get('/', function () {
	return view('/auth/login');
});
Route::get('password/lost', 'ForgotPasswordController@forgotPassword');
Route::get('register/service_provider', 'Auth\RegisterController@serviceRegister');
Route::get('register/customer', 'Auth\RegisterController@customerRegister');

Auth::routes();
Route::get('dashboard', 'DashboardController@index');

// View Service Provider
Route::get('/view/service_providers', 'ServiceController@index')->name('viewServiceProviders');

// To Accept & Reject Service Provider
Route::get('/accept_service_provider/{id}', 'ServiceController@accept')->name('accept');
Route::get('/reject_service_provider/{id}', 'ServiceController@reject')->name('reject');

Auth::routes();
