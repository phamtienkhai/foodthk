<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@indexAll')->name('showAllProduct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'seller'], function (){
    Route::get('/', 'SellerController@index')->name('seller.home');
    Route::get('/product/add', 'ProductController@create')->name('seller.addProduct');
    Route::post('/product/add', 'ProductController@store')->name('seller.storeProduct');
    Route::get('/product/list', 'ProductController@sellerIndex')->name('seller.showProduct');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('seller.editProduct');
    Route::post('/product/update/{id}', 'ProductController@update')->name('seller.updateProduct');
    Route::get('/product/delete/{id}', 'ProductController@destroy')->name('seller.deleteProduct');

    // Route::get();

});
Route::group(['prefix' => 'account'], function (){
    Route::get('/profile', 'AccountController@index')->name('user.profile');
});
