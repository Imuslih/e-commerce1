<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('index');});
    Route::get('/products/index', [ProductController::class, 'index']);
    Route::get('/categories/index', [CategoryController::class, 'index']);
    Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('index_transaksi');
    Route::get('/user/profile', [UserController::class, 'edit'])->name('edit_profile');

    Route::put('/user/profile', [UserController::class, 'update'])->name('update_profile');
});

//controller
Route::get('/electronic', [ProductController::class, 'index']);
//Route::get('/products/index', [ProductController::class, 'index']);
Route::get('/products/add', [ProductController::class, 'create']);
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::get('products/{id}/delete', [ProductController::class, 'destroy']);

Route::post('/products/add', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);

//category
//Route::get('/categories/index', [CategoryController::class, 'index']);
Route::get('/categories/add', [CategoryController::class, 'create']);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
Route::get('categories/{id}/delete', [CategoryController::class, 'destroy']);

Route::post('/categories/add', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);

//transaksi
//Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('index_transaksi');
Route::get('transaksi/cart', [TransaksiController::class, 'cart']);
Route::get('transaksi/add/{id}', [TransaksiController::class, 'add'])->where('id','[0-9]+');
Route::get('transaksi/hapus/{id}', [TransaksiController::class, 'hapus'])->where('id','[0-9]+');
Route::get('/transaksi/create', [TransaksiController::class, 'tambah_transaksi']);

//Auth
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::post('/register', [AuthController::class, "doRegister"])->name('do.register');
Route::post('/login', [AuthController::class, "doLogin"])->name('do.login');
