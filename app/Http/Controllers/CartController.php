<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);

        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
{
    
    $productId = $request->input('id');
    $productName = $request->input('name');
    $productPrice = $request->input('price');
    $quantity = $request->input('quantity');

    $cartItems = session()->get('cart', []);

    $existingItem = null;

    foreach ($cartItems as $key => $item) {
        if (isset($item['id']) && $item['id'] == $productId) {
            $existingItem = $key;
            break;
        }
    }

    if ($existingItem !== null) {
        // Update quantity if the product is already in the cart
        $cartItems[$existingItem]['quantity'] += $quantity;
    } else {
        // Add the product to the cart
        $cartItems[] = [
            'id' => $productId,
            'name' => $productName,
            'quantity' => $quantity,
            'price' => $productPrice,
        ];
    }

    // Store the updated cart items in the session
    session()->put('cart', $cartItems);

    // Calculate the total cart items
    $totalItems = count($cartItems);

    $totalPrice = array_reduce($cartItems, function ($carry, $item) {
        return $carry + ($item['quantity'] * $item['price']);
    }, 0);

    return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
}


    public function removeFromCart(Product $product)
    {
        // Remove the specified product from the cart
    }





}
