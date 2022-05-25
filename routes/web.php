<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [ProductController::class, 'index']);
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::post('place-from-cart', [ProductController::class, 'place_order'])->name('place.from.cart');
Route::get('product-details', [ProductController::class, 'product_details'])->name('product.details');
Route::get('/login', 'LoginController@show')->name('login.show');
Route::post('/login', 'LoginController@login')->name('login.perform');



## admin routes
Route::group([ 'prefix' => 'admin', "namespace" => 'App\Http\Controllers'], function()
{
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/products', [ProductController::class, 'view'])->name('view');

    Route::post('/add_product', [ProductController::class, 'add'])->name('add');
    Route::post('/edit_product', [ProductController::class, 'edit'])->name('edit');

    Route::get('del_product/{id}', [ProductController::class, 'delete'])->name('delete');

    Route::get('/orders', [ProductController::class, 'orders'])->name('orders');

    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});

## Guest routes
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['middleware' => ['guest']], function() {

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
