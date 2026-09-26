<?php

use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductApiControllerV2;
use App\Http\Controllers\Api\ProductApiControllerV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$basePath = '/';
$productPath = 'products';

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get(
    $basePath.$productPath,
    [ProductApiController::class, 'index']
)->name('api.product.index');

Route::post(
    $basePath.$productPath,
    [ProductApiController::class, 'store']
)->name('api.product.store');

Route::get(
    $basePath.$productPath.'/{id}',
    [ProductApiController::class, 'show']
)->whereNumber('id')->name('api.product.show');

Route::get(
    $basePath.'v2/'.$productPath,
    [ProductApiControllerV2::class, 'index']
)->name('api.v2.product.index');

Route::get(
    $basePath.'v2/'.$productPath.'/{id}',
    [ProductApiControllerV2::class, 'show']
)->whereNumber('id')->name('api.v2.product.show');

Route::get(
    $basePath.'v3/'.$productPath,
    [ProductApiControllerV3::class, 'index']
)->name('api.v3.product.index');

Route::get(
    $basePath.'v3/'.$productPath.'/paginate',
    [ProductApiControllerV3::class, 'paginate']
)->name('api.v3.product.paginate');
