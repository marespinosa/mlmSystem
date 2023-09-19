<?php

namespace App\Services;

use App\Models\ProductModel; // Import the correct ProductModel class

class CartService
{
    protected $cart;

    public function __construct()
    {
        // Initialize the cart (could be a session, database, etc.)
        // In this example, we'll use a session-based cart.
        $this->cart = session('cart', []);
    }

    public function addToCart(ProductModel $product, $quantity = 1)
    {
        // Check if the product is already in the cart
        if (isset($this->cart[$product->id])) {
            // If it is, increase the quantity
            $this->cart[$product->id]['quantity'] += $quantity;
        } else {
            // If not, add it to the cart
            $this->cart[$product->id] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        // Update the cart in the session
        session(['cart' => $this->cart]);
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function clearCart()
    {
        // Clear the cart by emptying the session
        session(['cart' => []]);
    }

    // You can add more methods for cart manipulation as needed
}
