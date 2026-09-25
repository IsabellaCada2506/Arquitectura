<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {
        return (new ProductCollection(Product::all()))->response();
    }

    public function paginate(): JsonResponse
    {
        return (new ProductCollection(Product::paginate(5)))->response();
    }
}