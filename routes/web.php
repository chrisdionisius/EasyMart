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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/katalog', 'KatalogController@index');
Route::get('/katalog/{id}', 'KatalogController@show');

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::resource('kategoris', 'KategoriController');
        Route::resource('produks', 'ProdukController'); 
        Route::resource('transaksis', 'TransaksiController'); 
        Route::get('produks/{product_id}/images', 'ProdukController@images');
        Route::get('produks/{product_id}/add-image', 'ProdukController@add_image');
        Route::post('products/images/{product_id}', 'ProdukController@upload_image');
        Route::delete('products/images/{product_id}', 'ProdukController@delete_image');
        Route::get('transaksis/masuk/{product_id}', 'TransaksiController@create');
    }
);