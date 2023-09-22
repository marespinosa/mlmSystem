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
            'attachedPayments' => 'required|string',
        ]);
    
        $usersmain = auth()->user();
        $total = $this->calculateTotal($cart);

        $order = checkoutModel::create([
            'users_id' => $usersmain->id, 
            'total_amount' => $request->total,
            'firstName' => $request->firstName,
            'lastName'=> $request->lastName,
            'phonenumber'=> $request->phonenumber,
            'address'=> $request->address,
            'address2'=> $request->address2,
            'zipcode'=> $request->zipcode,
            'city'=> $request->city,
            'status'=> $request->status,
            'payments'=> $request->payments,
            'attachedPayments'=> $request->attachedPayments,
            'created_at' => now(),
        ]);


        $order->save();

    
        $cart = session()->get('cart');
    
        foreach ($cart as $productId => $item) {
            DB::table('orderitems')->insert([
                'users_id' => $usersmain->id, 
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'item_price' => $item['price'],
                'subtotal' => $item['quantity'] * $item['price'],
            ]);
        }
    
        session()->forget('cart');
    
        return redirect()->route('checkout.checkoutprocess');
    }


    public function checkoutConfirmation()
    {
        $user = auth()->user();
        $orderconfirmed = checkoutModel::where('users_id', $user->id)->latest()->first();

            if (!$order) {
                return redirect()->back()->with('error', 'No order found for this user.');
            }
        
        $orderItems = DB::table('orderitems')
            ->where('users_id', $user->id)
            ->where('order_id', $order->id)
            ->get();
    


        return view('checkout.checkoutprocess', compact('orderconfirmed', 'orderItems'));
            
    }



}
