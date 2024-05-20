<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/create', [CartController::class, 'add']);
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order/create', [OrderController::class, 'add'])->name('order.post');
