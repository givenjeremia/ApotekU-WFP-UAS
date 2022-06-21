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


Auth::routes();
Route::get('/', 'ObatController@front_index');

Route::get('/home', 'HomeController@dashboardPage')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/add-to-cart/{id}', 'ObatController@addToCart')->middleware('auth');
    Route::get('/cart', 'ObatController@cart');
    Route::resource('/transaksi', TransaksiController::class);

});

Route::middleware(['can:admin-permission'])->group(function(){
    Route::get('/admin', function () {
        return view('layouts.conquer2');
    });
    
    Route::resource('/admin/obat', ObatController::class);
    Route::resource('/admin/kategori', KategoriController::class);
    
    Route::post('/admin/kategori/getEditForm','KategoriController@getEditForm')->name('kategori.getEditForm');
    Route::post('/admin/obat/getEditForm','ObatController@getEditForm')->name('obat.getEditForm');
    
    Route::get('/admin/miripIndex','KategoriController@miripIndex')->name('miripIndex');
});





