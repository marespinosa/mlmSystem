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

        $request->validate([
           'attachedPayments' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $cart = Session::get('cart');
        
        $total = $this->calculateTotal($cart);

         DB::transaction(function () use ($request, $sponsorTreeModel, $total) {

            $trackingNo = $request->input('sponsor_id_number') . '_' . rand(1111, 9999);

            $order = new checkoutModel();

            $order->firstName = $request->input('firstName');
            $order->lastName = $request->input('lastName');
            $order->phoneNumber = $request->input('phoneNumber');
            $order->address = $request->input('address');
            $order->address2 = $request->input('address2');
            $order->zipcode = $request->input('zipcode');
            $order->city = $request->input('city');
            $order->payments = $request->input('payments');
            $order->sponsor_id_number = $request->input('sponsor_id_number');
            $order->tracking_no = $trackingNo;
            $order->total_amount = $total;
            $order->citybelongto = $request->input('citybelongto');
            $order->created_at = now();

            if ($request->hasFile('attachedPayments')) {
                $imagePath = $request->file('attachedPayments')->store('attachedPayments', 'public');
                $order->attachedPayments = $imagePath;
            }
    
            
            $cartItems = $sponsorTreeModel->where('users_id', Auth::id())->get();

            $orderItems = $cartItems->map(function ($item) use ($order) {
                return [
                    'orders_id' => $order->id,
                    'products_id' => $item->products_id,
                    'product_name' => $item->product->name,
                    'item_price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->quantity * $item->product->price,
                ];
            });
            
            ordersModel::insert($orderItems->toArray());

            $order->save(); 
          
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
