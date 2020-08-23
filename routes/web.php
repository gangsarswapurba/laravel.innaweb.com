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
    return view('dashboard', [
        'nama_route' => 'Dashboard',
    ]);
});

Route::get('product/{nama_user?}', function ( $nama_user = null ) {
    return view('product', [
        'nama_route' => 'Produk',
        'nama_user' => $nama_user
    ]);
});

Route::view('/order', 'order', [
    'nama_route' => 'Penjualan'
]);

Route::get('/kadal', 'KadalController@render');