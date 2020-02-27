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
Route::get('logout', 'Auth\LoginController@userlogout')->name('logout');
// To open dashboard for Admin, Service Provider and Customer
Route::get('dashboard', 'DashboardController@index');

// ----------------------------------------------------------------------------------------------------------
// View Service Provider
Route::get('/view/service_providers', 'ServiceProviderController@index')->name('viewServiceProviders');

// To Accept & Reject Service Provider
Route::get('/accept_service_provider/{id}', 'ServiceProviderController@accept')->name('accept');
Route::get('/reject_service_provider/{id}', 'ServiceProviderController@reject')->name('reject');
// ----------------------------------------------------------------------------------------------------------

// To view Services
Route::get('/view/services', 'ServiceController@index')->name('viewServices');
// To create Services
Route::get('/create/services', 'ServiceController@create')->name('createService');
// To Store Services
Route::POST('/store/services', 'ServiceController@store')->name('storeService');
// To View Edit Page Of Services
Route::get('/edit/services/{id}', 'ServiceController@edit')->name('editService');
// To Update Service
Route::PATCH('/update/services/{id}', 'ServiceController@update')->name('updateService');
// To Delete Service
Route::DELETE('/delete/services/{id}', 'ServiceController@destroy')->name('deleteService');
// ----------------------------------------------------------------------------------------------------------

// To view Services requested by customer
Route::get('/view/customer/services', 'ServiceController@viewToCustomer')->name('viewServicesForCustomer');
// To open create service request page
Route::get('/create/request/services', 'ServiceController@sendRequest')->name('createServiceRequest');
// To store sent service
Route::POST('/store/service/requested', 'ServiceController@storeRequests')->name('storeServiceRequest');
// ----------------------------------------------------------------------------------------------------------

// To show notifications to service Provider
Route::get('/show/notifications', 'NotificationController@index')->name('showServiceProviderNotification');
// To Accept the request
Route::get('/accept/request/{id}', 'NotificationController@acceptRequest')->name('acceptRequest');
// To View Accepted Service Provider
Route::get('/view/service_provider/{id}', 'NotificationController@viewServiceProvider')->name('viewServiceProvider');

// ----------------------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------------------

Auth::routes();
