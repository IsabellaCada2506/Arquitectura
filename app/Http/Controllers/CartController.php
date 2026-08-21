<?php

namespace App\Http\Controllers;

// Dictatorship 1: Class import reference
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View; // Added Product model

class CartController extends Controller
{
    // Dictatorship 3: Defining return types (View)
    public function index(Request $request): View
    {
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); // We get the product IDs stored in session

        if ($cartProductData) {
            // Dictatorship (DB Queries): Using Eloquent to find only the products that are in the cart
            $cartProducts = Product::findMany(array_keys($cartProductData));
        }

        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';

        // Dictatorship 4: We do not manage the list of products directly in the controller anymore. We use Eloquent.
        $viewData['products'] = Product::all();
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    // Dictatorship 3: Defining return types (RedirectResponse)
    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    // Dictatorship 3: Defining return types (RedirectResponse)
    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back();
    }
}
