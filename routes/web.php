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

Route::resource('book', 'BookController');

Route::get('shop', 'ShopController@index')->name('shop.index');

Route::get('shopcart', 'ShopCartController@index')->name('shopcart.index');

Route::delete('deleteFromCart/{id}', 'ShopCartController@deleteFromCart')->name('shopcart.destroy');

Route::post('addToCart/{id}', 'ShopCartController@addToCart')->name('shopcart.addToCart');
