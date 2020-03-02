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
// To Track Services
Route::get('/track/services', 'ServiceProviderController@trackMyService')->name('trackMyService');
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
// To View Feedback
Route::get('/view/feedback', 'FeedbackController@index')->name('viewFeedback');
// To send Feedback
Route::get('/send/feedback', 'FeedbackController@create')->name('sendFeedback');
// To store Feedback
Route::POST('/store/feedback', 'FeedbackController@store')->name('storeFeedback');
// ----------------------------------------------------------------------------------------------------------

// To view payment page
Route::get('/view/payment', 'PaymentController@index')->name('viewPayment');
// To store payment details
Route::POST('/store/feedback', 'PaymentController@store')->name('storePayment');

// ----------------------------------------------------------------------------------------------------------
Route::get('profile', 'UserController@profile');
Route::get('changepassword', 'UserController@changepassword');
Route::post('updatepassword', 'UserController@updatePassword');
Route::get('password/lost', 'ForgotPasswordController@forgotPassword');
Route::post('update/{user_id}', 'UserController@updateprofile');
Route::post('changePassword/{user_id}', 'UserController@updatePassword')->name('changePassword');
Route::get('user/profile', 'UserController@profile');
// ----------------------------------------------------------------------------------------------------------
Route::get('/view/packages', 'PackageController@index')->name('viewPackages');
Route::get('/create/package', 'PackageController@create')->name('createPackage');
Route::POST('/store/package', 'PackageController@store')->name('storePackage');
Route::get('/edit/package/{id}', 'PackageController@edit')->name('editPackage');
Route::PATCH('/update/package/{id}', 'PackageController@update')->name('updatePackage');
Route::DELETE('/delete/package/{id}', 'PackageController@destroy')->name('deletePackage');
// ----------------------------------------------------------------------------------------------------------

Route::get('/view/customers', 'CustomerController@index')->name('viewCustomers');
Route::get('/view/requests', 'RequestController@index')->name('viewRequests');
Route::get('/view/subscription', 'SubscriptionController@index')->name('viewSubscription');
Route::get('/view/feedbacks', 'FeedbackController@view')->name('viewFeedbacks');
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------

Auth::routes();
