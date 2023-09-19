<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

use App\Services\CartService; 

class CartController extends Controller
{
    public function index()
    {
        // Fetch the user's cart items and display them in a view.
        // You need to implement this logic to retrieve cart items from the database.
    }

    public function add(Request $request, ProductModel $product)
    {
        // Retrieve the user's cart and add the product to it
        $cartService = new CartService(); // Initialize the CartService (you can also inject it via constructor)
        $cartService->addToCart($product);
    
        // Redirect back to the product listing or cart page
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function remove(Request $request, ProductModel $product)
    {
        // Remove a product from the user's cart.
        // You can use the $product variable to access the selected product.
        // Implement logic to remove the product from the cart in the database.
    }

    public function update(Request $request, ProductModel $product)
    {
        // Update the quantity of a product in the user's cart.
        // You can use the $product variable to access the selected product.
        // Implement logic to update the cart item's quantity in the database.
    }
}
