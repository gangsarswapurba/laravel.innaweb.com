<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/product', 'ProductController@index');
Route::get('/product/ubah/{id}', 'ProductController@ubah');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/save', 'ProductController@save');
Route::post('/product/save/{id}', 'ProductController@save');
Route::get('/product/delete/{id}', 'ProductController@delete');

Route::get('/order', 'OrderController@index');
Route::get('/order/view/{id}', 'OrderController@view');
Route::get('/order/create', 'OrderController@create');
Route::post('/order/save', 'OrderController@save');
Route::get('/order/delete/{id}', 'OrderController@delete');

Route::get('/api/sales/lastMonth', 'SalesController@lastMonth');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');