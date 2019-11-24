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
    return view('home');
});
Route::get('/about', function () {
    return view('About');
});
Route::get('/contact', function () {
    return view('Contact');
});
Route::view('/billing', 'Billing' );
Route::post('/contact/submit','MessagesController@submit');
Route::post('/about/submit','MillDetailsController@submit');
Route::post('/billing/submit','BillingOrderController@submit');
Route::get('/billing','BillingOrderController@getData');
Route::get('/billing/get_millDetails','BillingOrderController@getMillDetails')->name('billing.get_millDetails');
Route::get('/billing/get_hsn','BillingOrderController@getHSNDetails')->name('billing.get_hsn');
