<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index']);
Route::get('/home', [UserController::class, 'index']);
Route::get('/about', [UserController::class, 'about']);
Route::get('/mahasiswa', [UserController::class, 'mahasiswa']);
Route::get('/menu', [UserController::class, 'menu']);
Route::get('/contact', [UserController::class, 'contact']);

Route::get('/Login', [UserController::class, 'login']);
Route::get('/SignUp', [UserController::class, 'signup']);


Auth::routes();

//Hak Akses
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/tambahGambar', [AdminController::class, 'tambahGambar']);
    Route::post('/tambahGambar', [AdminController::class, 'dotambahGambar']);
    Route::get('/adminPromo', [AdminController::class, 'promo']);
    Route::delete('/adminPromo/{data}', [AdminController::class, 'deletepromo']);
    Route::patch('/adminPromo/edit/{data}', [AdminController::class, 'editpromo']);
    Route::get('/adminRekomendasi', [AdminController::class, 'rekomendasi']);
    Route::delete('/adminRekomendasi/{data}', [AdminController::class, 'deleterekomendasi']);
    Route::patch('/adminRekomendasi/edit/{data}', [AdminController::class, 'editrekomendasi']);
    Route::get('/adminDiskon', [AdminController::class, 'diskon']);
    Route::delete('/adminDiskon/{data}', [AdminController::class, 'deletediskon']);
    Route::patch('/adminDiskon/edit/{data}', [AdminController::class, 'editdiskon']);
    Route::get('/adminMenu', [AdminController::class, 'menu']);
    Route::delete('/adminMenu/{data}', [AdminController::class, 'destroy']);
    Route::patch('/adminMenu/edit/{data}', [AdminController::class, 'menuEdit']);
    Route::get('/tambahData', [AdminController::class, 'tambahdata']);
    Route::post('/tambahData', [AdminController::class, 'dotambah']);
});

Route::group(['middleware' => 'user'], function() {
    Route::get('/keranjang', [CartsController::class, 'index']);
    Route::post('/keranjang/checkout', [CartsController::class, 'checkout']);
    Route::get('/keranjang/{data}', [CartsController::class, 'store']);
    Route::delete('/keranjang/{data}', [CartsController::class, 'destroy']);
    Route::get('/menu/{data}', [CartsController::class, 'pesanMenu']);
});