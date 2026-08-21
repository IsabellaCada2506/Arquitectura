<?php

use App\Http\Controllers\CartController;
// Dictatorship 1: Class import reference instead of string-based routing
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageNotDIController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/save', [ProductController::class, 'save'])->name('product.save');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/removeAll/', [CartController::class, 'removeAll'])->name('cart.removeAll');

//  Imagen (DI)
Route::get('/image', [ImageController::class, 'index'])->name('image.index');
Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');

// Imagen (Sin DI)
Route::get('/image-not-di', [ImageNotDIController::class, 'index'])->name('imagenotdi.index');
Route::post('/image-not-di/save', [ImageNotDIController::class, 'save'])->name('imagenotdi.save');
