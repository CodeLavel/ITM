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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/durables/category/{id}', 'HomeController@find');
Route::get('/durables/catagory/{id}', 'HomeController@cata');
Route::get('/durables/details/{id}', 'HomeController@details');
Route::get('/durables/cart','ProcessController@showCart');
Route::get('/durables/cart/deleteFormCart/{id}','ProcessController@deleteFormCart');
Route::get('/durables/cart/deleteFormDetail/{id}','ProcessController@deleteFormDetail');
Route::get('/durables/search','ProcessController@searchDurable');
Route::post('/durables/addQuantityToCart/{id}','ProcessController@addQuantityToCart');
Route::get('/durables/checkout','ProcessController@checkout');
Route::post('/durables/createOrder','ProcessController@createOrder');
Route::get('/durables/addQuantityToCart/{id}','ProcessController@addOrdersall');

Route::get('orders','OrderController@orderPanel');
Route::get('orders/detail/{id}','OrderController@showOrderDetail');
Route::post('/orders/detailord','OrderController@detailord')->name('returnorder');
Route::post('/orders/addQuantityToInventory/{id}', 'OrderController@addQuantityToInventory');
Route::get('orderall/{id}','OrderController@orderall')->name('orderall');

Route::put('confirm/edit/{id}','ConfirmController@update');
Route::put('borrow/edit/{id}','BorrowController@update');
Route::get('orders/search','OrderController@searchOrder');
Route::get('orders/showorder','OrderController@showorder');
Route::get('orders/showorderlogs','OrderController@showorderlogs');
Route::get('orders/showordermount','OrderController@showordermount');
Route::post('orders/showorderdate','OrderController@showorderdate')->name('showorderdate');
Route::get('orders/showordersuccess','OrderController@showordersuccess');
Route::get('orders/showorderfailed','OrderController@showorderfailed');
Route::get('orders/pdf','OrderController@pdf');
Route::get('orders/pdf2','OrderController@pdf2');
Route::get('orders/pdf3','OrderController@pdf3');
Route::get('orders/pdf4','OrderController@pdf4');
// Route::get('/prnpriview','OrderController@prnpriview');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

//Otp ยังไม่เสร็จ
Route::get('/orders/otp','HomeController@sentOtp')->name('otp');
Route::post('order/confirm','ProcessController@insertOrder')->name('otpconfirm');

Route::get('line/sentLine','HomeController@sentLine')->name('sentLine');
Route::post('line/token','HomeController@LineToken')->name('LineToken');

Route::middleware(['auth'])->group(function(){
Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'durables',
], function () {
    Route::get('/', 'DurablesController@index')
         ->name('durables.durable.index');
    Route::get('/create','DurablesController@create')
         ->name('durables.durable.create');
    Route::get('/show/{durable}','DurablesController@show')
         ->name('durables.durable.show')->where('id', '[0-9]+');
    Route::get('/{durable}/edit','DurablesController@edit')
         ->name('durables.durable.edit')->where('id', '[0-9]+');
    Route::post('/', 'DurablesController@store')
         ->name('durables.durable.store');
    Route::put('durable/{durable}', 'DurablesController@update')
         ->name('durables.durable.update')->where('id', '[0-9]+');
    Route::delete('/durable/{durable}','DurablesController@destroy')
         ->name('durables.durable.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'catagories',
], function () {
    Route::get('/', 'CatagoriesController@index')
         ->name('catagories.catagory.index');
    Route::get('/create','CatagoriesController@create')
         ->name('catagories.catagory.create');
    Route::get('/show/{catagory}','CatagoriesController@show')
         ->name('catagories.catagory.show')->where('id', '[0-9]+');
    Route::get('/{catagory}/edit','CatagoriesController@edit')
         ->name('catagories.catagory.edit')->where('id', '[0-9]+');
    Route::post('/', 'CatagoriesController@store')
         ->name('catagories.catagory.store');
    Route::put('catagory/{catagory}', 'CatagoriesController@update')
         ->name('catagories.catagory.update')->where('id', '[0-9]+');
    Route::delete('/catagory/{catagory}','CatagoriesController@destroy')
         ->name('catagories.catagory.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'users',
 ], function () {
     Route::get('/', 'UserController@index')
          ->name('users.index');
     Route::get('/create','UserController@create')
          ->name('users.users.create');
     Route::get('/show/{users}','UserController@show')
          ->name('users.users.show')->where('id', '[0-9]+');
     Route::get('/{users}/edit','UserController@edit')
          ->name('users.users.edit')->where('id', '[0-9]+');
     Route::post('/', 'UserController@store')
          ->name('users.users.store');
     Route::put('users/{users}', 'UserController@update')
          ->name('users.users.update')->where('id', '[0-9]+');
     Route::delete('/users/{users}','UserController@destroy')
          ->name('users.users.destroy')->where('id', '[0-9]+');
 });

});
