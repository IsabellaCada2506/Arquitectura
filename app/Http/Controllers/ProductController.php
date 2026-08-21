<?php

namespace App\Http\Controllers;

// Dictatorship 1: Class import reference
// Dictatorship 2: Validation must go in a Form Request, not the controller.
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Dictatorship 3: Defining return types
    public function index(): View
    {
        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        // Dictatorship (DB Queries / N+1): Using Eager Loading to fetch the product and its comments in a single query
        $product = Product::with('comments')->findOrFail($id);

        // Dictatorship (Encapsulation): Using getters instead of direct array access (e.g., $product["name"])
        $viewData['title'] = $product->getName().' - Online Store';
        $viewData['subtitle'] = $product->getName().' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // To be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    // Dictatorship 2: Passing ProductRequest instead of the default Request.
    // The validation rules are now handled automatically inside ProductRequest.
    public function save(ProductRequest $request): RedirectResponse
    {
        // Dictatorship (Mass Assignment): $fillable in the model protects this action.
        Product::create($request->only(['name', 'price']));

        return back();
    }
}
