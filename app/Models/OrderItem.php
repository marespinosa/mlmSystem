<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'item_price'];

    // Define the relationship with the 'orders' table
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Define the relationship with the 'products' table
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}