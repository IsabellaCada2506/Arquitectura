<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV2 extends Controller
{
    public function index(): JsonResponse
    {
        return ProductResource::collection(Product::all())->response();
    }

    public function show(int $id): JsonResponse
    {
        return (new ProductResource(Product::findOrFail($id)))->response();
    }
}
