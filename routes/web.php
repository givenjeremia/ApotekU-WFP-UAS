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
    return view('layouts.conquer2');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){


});

Route::get('/', 'ObatController@front_index');
Route::get('/add-to-cart/{id}', 'ObatController@addToCart');
Route::get('/cart', 'ObatController@cart');



Route::resource('/obat', ObatController::class);
Route::resource('/kategori', KategoriController::class);

Route::post('/kategori/getEditForm','KategoriController@getEditForm')->name('kategori.getEditForm');
Route::post('/obat/getEditForm','ObatController@getEditForm')->name('obat.getEditForm');

Route::get('/miripIndex','KategoriController@miripIndex')->name('miripIndex');

Route::get('/home', 'HomeController@index')->name('home');

