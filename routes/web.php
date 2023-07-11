<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');
Route::get('/login',[UserController::class, 'index'])->name('login');
Route::post('/login-proses',[UserController::class, 'login_proses'])->name('login-proses');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register-proses',[UserController::class, 'register_proses'])->name('register-proses');

Route::middleware(['auth'])->group(function(){
Route::get('/product/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::post('/products/{product}/add', [ProductController::class, 'add'])->name('products.add');
Route::get('/product/create',[productController::class,'create']);
Route::POST('/product/store', [productController::class,'store']);
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::put('/product/update/{id}', [ProductController::class,'update']);
Route::get('/product/delete/{id}', [ProductController::class,'delete']);
Route::get('/product/unavailable', [ProductController::class, 'unavailable'])->name('product.unavailable');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');
Route::get('/transaksi/delete/{id}',[TransaksiController::class,'deleteData']);
Route::get('/transaksi/{transaksi}/detail', [TransaksiController::class, 'detail'])->name('transaksi.detail');
});
