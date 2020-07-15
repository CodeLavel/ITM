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
Route::get('/durables/search','ProcessController@searchDurable');
Route::post('/durables/addQuantityToCart/{id}','ProcessController@addQuantityToCart');
Route::get('/durables/checkout','ProcessController@checkout');
Route::post('/durables/createOrder','ProcessController@createOrder');

Route::get('orders','OrderController@orderPanel');
Route::get('orders/detail/{id}','OrderController@showOrderDetail');
Route::get('/orders/detailord/{id}','OrderController@detailord');
Route::post('/orders/addQuantityToInventory/{id}', 'OrderController@addQuantityToInventory');

Route::put('confirm/edit/{id}','ConfirmController@update');
Route::put('borrow/edit/{id}','BorrowController@update');
Route::get('orders/search','OrderController@searchOrder');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

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

});