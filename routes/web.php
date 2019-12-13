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

Route::get('/cart', 'CartController@index')->middleware('logincheck');

Route::get('/homepage', 'HomeController@index')->middleware('logincheck');
Route::get('/register', 'RegisterController@register');
Auth::routes();

Route::get('/', 'RegisterController@login')->name('login');

Route::get('/admin', function () {
    return view('admin.insert_type');
});

Route::post('/cart/checkout', 'TransactionHistoryController@checkout')->middleware('logincheck');
Route::delete('/cart/{id}/delete', 'CartController@remove')->middleware('logincheck');
Route::get('/flowers/{id}', 'FlowerDetailsController@detail')->middleware('logincheck');
Route::get('/flowers/{id}/orderdetail', 'FlowerDetailsController@orderdetail')->middleware('logincheck');
Route::get('/flowers/{id}/order', 'RegisterController@order')->middleware('logincheck');
Route::get('/logout', 'HomeController@logout')->middleware('logincheck');
Route::get('/homepage/search', 'HomeController@search')->middleware('logincheck');
Route::get('/login', 'RegisterController@login');
Route::post('/registerPost', 'RegisterController@store');
Route::post('/loginPost', 'RegisterController@loginPost');
Route::put('/courier/{id}', 'CourierController@update')->middleware('logincheck');
Route::get('/courier/{id}/edit', 'CourierController@edit')->middleware('logincheck');
Route::get('admin/layout', 'FlowerTypeController@create')->middleware('logincheck');
Route::post('admin/layout', 'FlowerTypeController@store')->middleware('logincheck');


Route::get('/admin/flowers', 'FlowerController@index')->middleware('admin');
Route::get('/admin/flowers/{id}/edit','FlowerController@edit')->middleware('admin');
Route::post('/admin/flowers/{id}/update','FlowerController@update')->middleware('admin');
Route::delete('/admin/flowers/{id}/delete', 'FlowerController@destroy')->middleware('admin');
Route::get('/admin/flowers/insert', 'FlowerController@create')->middleware('admin');
Route::post('/admin/flowers/insert', 'FlowerController@store')->middleware('admin');
Route::get('/admin/flowers/type', 'FlowerTypeController@index')->middleware('admin');
Route::get('/admin/flowers/type/{id}/edit','FlowerTypeController@edit')->middleware('admin');
Route::post('/admin/flowers/type/{id}/update','FlowerTypeController@update')->middleware('admin');
Route::delete('/admin/flowers/type/{id}/delete', 'FlowerTypeController@destroy')->middleware('admin');
Route::get('/admin/flowers/search', 'FlowerController@search')->middleware('admin');
Route::get('/admin/flowers/type/search', 'FlowerTypeController@search')->middleware('admin');
Route::get('/admin/flowers/type/insert', 'FlowerTypeController@create')->middleware('admin');
Route::post('/admin/flowers/type/insert', 'FlowerTypeController@store')->middleware('admin');

Route::get('/admin/couriers', 'CourierController@index')->middleware('admin');
Route::get('/admin/couriers/{id}/edit','CourierController@edit')->middleware('admin');
Route::post('/admin/couriers/{id}/update','CourierController@update')->middleware('admin');
Route::delete('/admin/couriers/{id}/delete', 'CourierController@destroy')->middleware('admin');
Route::get('/admin/couriers/search', 'CourierController@search')->middleware('admin');
Route::get('/admin/couriers/insert', 'CourierController@create')->middleware('admin');
Route::post('/admin/couriers/insert', 'CourierController@store')->middleware('admin');

Route::get('/admin/manage_users', 'AdminController@index')->middleware('admin');
Route::delete('/admin/manage_users/{id}/delete','AdminController@remove')->middleware('admin');
Route::get('/admin/manage_users/{id}/edit', 'AdminController@edit')->middleware('admin');
Route::post('/admin/manage_users/{id}/update','AdminController@update')->middleware('admin');

Route::get('/profile/edit', 'ProfileController@edit');
Route::put('/profile', 'ProfileController@update');

