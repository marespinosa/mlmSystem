<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\OrdersShow;
use App\Models\ordersModel;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $userId = $request->input('users_id'); 
    
        $userOrderItems = ordersModel::with('sponsorTree')->where('users_id', $userId)->get();
    
        return view('orders.index', compact('userOrderItems'));
    }

  public function allOrders()
   {
       $orders = OrdersShow::with('ordersAll')->get();
       return view('orders.all', compact('orders'));
   }


   public function indexOrders(Request $request)
   {

    $userId = $request->input('users_id');

    $orders = OrdersShow::with('orderItems')
        ->whereHas('orderItems', function ($query) use ($userId) {
            $query->whereColumn('orders.users_id', 'orderitems.users_id')
                ->where('orderitems.users_id', $userId);
        })->get();

    return view('orders.index', compact('orders'));

    
   }


   


}
