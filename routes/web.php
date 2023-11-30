<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('shop', 'ShopController@index');

Route::get('cart', 'CartController@index');

Route::get('shop/detail/{id}', 'ShopController@show');

Route::get('shop/category/{id}', 'ShopController@category');

Route::post('cart/store', 'CartController@store');
Route::patch('/cart/update/{id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::patch('cart/{id}', 'CartController@update');

Route::post('checkout', 'CheckoutController@store');

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('home', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [UserController::class, 'profile'])->name('profile');

Route::get('/reviews', 'ReviewController@index');
Route::get('/reviews/create', 'ReviewController@create');
Route::post('/reviews', 'ReviewController@store');
Route::get('/reviews/{id}', 'ReviewController@show');
Route::get('/reviews/{id}/edit', 'ReviewController@edit');
Route::put('/reviews/{id}', 'ReviewController@update');
Route::delete('/reviews/{id}', 'ReviewController@destroy');