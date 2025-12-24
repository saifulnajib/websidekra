<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NewsController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/produk', 'index')->name('products.index');
    Route::get('/produk/{id}', 'show')->name('products.show');
});
