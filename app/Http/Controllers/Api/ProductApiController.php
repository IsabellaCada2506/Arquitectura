<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductApiStoreRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products, Response::HTTP_OK);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product, Response::HTTP_OK);
    }

    public function store(ProductApiStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $product = new Product;
        $product->setName($validatedData['name']);
        $product->setPrice((int) $validatedData['price']);
        $product->save();

        return response()->json([
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ], Response::HTTP_CREATED);
    }
}