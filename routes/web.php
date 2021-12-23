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

// Route::get('/', function () {
//     return view('user.dashboard');
// });
Route::get('/', 'KatalogController@dashboard');
Auth::routes();

Route::get('/home', 'KatalogController@dashboard')->name('home');

Route::get('/katalog', 'KatalogController@index');
Route::get('/katalog/category/{id}', 'KatalogController@showByCategory');
Route::get('/katalog/{id}', 'KatalogController@show');
Route::post('/cart', 'QueueController@insert');
Route::get('/cart', 'QueueController@index');
Route::delete('/cart/{id}', 'QueueController@destroy');
Route::get('/checkout', 'QueueController@save');

 
Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('transaksis/listTransaksi', 'TransaksiController@listTransaksi');
        Route::get('transaksis/listPenjualan', 'TransaksiController@listPenjualan');
        Route::get('transaksis/listRestock', 'TransaksiController@listRestock');
        Route::get('transaksis/listStock', 'TransaksiController@listStock');
        Route::get('transaksis/masuk/{product_id}', 'TransaksiController@create');
        Route::resource('transaksis', 'TransaksiController');
        Route::resource('kategoris', 'KategoriController');
        Route::resource('orders', 'OrderController');
        Route::get('produks/{product_id}/images', 'ProdukController@images');
        Route::get('produks/{product_id}/add-image', 'ProdukController@add_image');
        Route::resource('produks', 'ProdukController'); 
        Route::post('products/images/{product_id}', 'ProdukController@upload_image');
        Route::delete('products/images/{product_id}', 'ProdukController@delete_image');
        
    }
);