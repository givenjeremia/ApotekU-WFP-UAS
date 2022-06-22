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

Route::get('/home', 'HomeController@dashboardPage')->name('home');


Route::get('/', 'ObatController@front_index')->name('obat.cari');;

Route::middleware(['can:member-permission'])->group(function(){
    Route::get('/add-to-cart/{id}', 'ObatController@addToCart');
    Route::get('/delete-item-cart/{id}', 'ObatController@deleteItemCart');
    Route::get('/cart', 'ObatController@cart');
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/checkout', 'TransaksiController@form_submit_front');
    Route::get('/submit_checkout', 'TransaksiController@submit_front')->name('submitcheckout');

});


Route::middleware(['can:admin-permission'])->group(function(){
    Route::get('/admin', 'ObatController@awalan'); 
    // Route::get('/admin', function () {
    //     return view('layouts.conquer2');
    // }); 
    Route::resource('/admin/obat', ObatController::class);
    Route::resource('/admin/kategori', KategoriController::class);
    
    Route::post('/admin/kategori/getEditForm','KategoriController@getEditForm')->name('kategori.getEditForm');
    Route::post('/admin/obat/getEditForm','ObatController@getEditForm')->name('obat.getEditForm');
    
    Route::get('/admin/miripIndex','KategoriController@miripIndex')->name('miripIndex');

    Route::get('/admin/dashboard', 'ObatController@awalan');

    Route::post('/admin/transaksi/showDataAjax','TransaksiController@showAjax')->name('transaksi.showAjax');
    Route::get('/admin/transaksi/showTransaksi','TransaksiController@baru')->name('transaksi.baru');

    Route::get('/admin/report/terlaris', 'LaporanController@ObatTerlaris')->name('report.terlaris');
    Route::get('/admin/report/terloyal', 'LaporanController@CustomerLoyal')->name('report.terloyal');
    
});







