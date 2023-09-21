<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\checkoutModel;


class CheckoutController extends Controller
{

    public function userInfo()
    {
        $users = checkoutModel::all();

        return view('checkout.index', ['users' => $users]);
    } 

    public function index()
    {
        $cart = session()->get('cart');
        $total = $this->calculateTotal($cart);

        $cartDetails = [];
    
        foreach ($cart as $productId => $item) {
            $product = ProductModel::find($productId);
    
            if ($product) {
                $cartDetails[] = [
                    'name' => $product->name,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['quantity'] * $item['price'],
                ];
            }
        }
    
        return view('checkout.index', compact('cartDetails', 'total'));
    }
    
    private function calculateTotal($cart)
    {
        $total = 0;
    
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
    
        return $total;
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
            'address2' => 'required|date',
            'zipcode' => 'required|string',
            'city' => 'required|string',
            'status' => 'required|string',
            'payments' => 'required|string',
        ]);
    
        $user = auth()->user();
    
        // Create a new order
        $order = DB::table('orders')->insertGetId([
            'user_id' => $user->id, // Change this according to your user system
            'total' => $request->total, // You need to pass the total from the form
            'created_at' => now(),
        ]);
    
        $cart = session()->get('cart');
    
        foreach ($cart as $productId => $item) {
            DB::table('order_items')->insert([
                'order_id' => $order,
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['quantity'] * $item['price'],
            ]);
        }
    
        session()->forget('cart');
    
        return redirect()->route('order.confirmation');
    }

}
