<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\sponsorTree;
use App\Models\ProductModel;
use App\Models\checkoutModel;
use App\Models\ordersModel;

class CheckoutController extends Controller
{

    
    public function userInfo()
    {
        $users = checkoutModel::all();

        return view('checkout.index', ['users' => $users]);
    } 

    public function confirmedOrder()
    {

        return view('checkout.confirmedOrder');
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
    

    public function placeOrder(Request $request, sponsorTree $sponsorTreeModel)
    {

        $cart = Session::get('cart');
        
        $total = $this->calculateTotal($cart);

         DB::transaction(function () use ($request, $sponsorTreeModel, $total) {
            $order = checkoutModel::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'phoneNumber' => $request->input('phoneNumber'),
                'address' => $request->input('address'),
                'address2' => $request->input('address2'),
                'zipcode' => $request->input('zipcode'),
                'city' => $request->input('city'),
                'payments' => $request->input('payments'),
                'sponsor_id_number' => $request->input('sponsor_id_number'),
                'tracking_no' => $request->input('sponsor_id_number') . rand(1111, 9999),
                'total_amount' => $total,
                'citybelongto' => $request->input('citybelongto'),
                'created_at' => now(),
            ]);

            $cartItems = $sponsorTreeModel->where('users_id', Auth::id())->get();

            foreach ($cartItems as $item) {
                ordersModel::create([
                    'orders_id' => $order->id,
                    'products_id' => $item->products_id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }
        });

        Session::forget('cart');

        return redirect()->route('checkout.confirmedOrder')->with('success', 'Order placed successfully.');
    }
    

    private function calculateTotal($cart)
    {
        $total = 0;
    
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
    
        return $total;
    }
   



}
